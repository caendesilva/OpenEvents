---
label: Using the Laravel Client
---

# Server-side analytics with the Laravel Client

To make it dead simple to send server-side events to the API, you can use the first-party client package for Laravel.

The Laravel Client even ships with a connection driver that stores events in your local database for redundancy and/or backup, as well as for sending events to the API asynchronously.

## Installation

Install with Composer:

```bash
composer require openevents/laravel-client
```

Publish the config file:
```bash
php artisan vendor:publish --provider="OpenEvents\LaravelClient\OpenEventsServiceProvider"
```

Next, add your API token and endpoint to your .env file.
```ini
OPENEVENTS_TOKEN=api_secret_token
OPENEVENTS_ENDPOINT=<replace_with_your_endpoint> # [tl! highlight .auth-highlight]
```

You are now ready to start sending events to the API!

## Usage

Dispatch events using the Event facade:

```php
use OpenEvents\LaravelClient\Event;

Event::dispatch('my-event', 'optional-context-data');
```

---

## Using the Database Connection

> This feature is experimental and is subject to change without notice.

### Introduction
The Laravel client ships with a connection method that allows you to store Events in your local Laravel database.

Some ideas on what you can use this feature for:

 - Keep events for redundancy and/or backup.
 - For testing, debug, and development purposes.
 - Queueing events to be sent to the API asynchronously.
 - It can be also used to store events locally to use without
   the API if you want to implement your own dashboard.


### How do connection drivers work and what do they do?
In essence, a connection takes an Event model and stores it somewhere.
When dispatching an Event through the Event facade, the Event will be sent to
the configured connection driver. When using the API driver the Event will be sent
to the API. When using the database connection the Event will be stored in the database.



### Migration 
It's highly recommended that the migration schema is compatible with the API to avoid any issues when sending events to the API.

The driver expects the following columns:
```php
'event': string
'data':  string|null
'time':  integer|null // (UNIX Epoch Timestamp)
'sent':  boolean|null // (Has the event been sent to the API?)
```
> Note that backdating is not implemented yet, but is added for future compatibility.


The events you send must follow the following validation rules:

```php
[
    'event' => 'required|string|max:32',
    'value' => 'nullable|string|max:128',
];
```

The database table name is defined in the connection class:
```php
protected string $table = 'openevents_events';
``` 

### Configuring the Database Connection

The default connection loaded in the Service Provider is the `API` connection.

You can change this by modifying the `config/openevents.php` file and adding one of the following lines: 
```php
'connection' => \OpenEvents\Client\Services\Connections\APIConnection::class,
'connection' => \OpenEvents\Client\Services\Connections\DatabaseConnection::class,
```

You can also create your own connection driver as long as it implements the
`OpenEvents\Client\Services\Connections\ConnectionContract` interface.


### Keeping records in sync
When dispatching an event to the API a UUID is returned with the response.
You may want to use this UUID to consolidate events in your database.

```php
// The following snippet is a pseudo-code example where an 
// Eloquent model has a method converting it to an OpenEvents\Event class.
$event = EloquentEventModel::create([
    'event' => 'MyEventName',
    'value' => 'MyPayload',
]);

$response = $event->toOpenEvent()->dispatchEvent()->getResponse();
$event->uuid = $response->uuid;
$event->save();
```

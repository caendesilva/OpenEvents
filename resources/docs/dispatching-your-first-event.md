---
priority: 3
---

# Dispatching your first event


First, get your endpoint. You can always find it on your [account settings](/user/profile) page.

<div class="auth-only">
    <label for="auth_user_endpoint">Your API endpoint:</label>
    <input id="auth_user_endpoint" type="text" readonly value="<replace_with_your_endpoint>">
</div>

Next, prepare your event data by making a JSON object that contains the event type and any optional context data.

Here is the example we will be sending:

```json
{
  "event": "test_page_view", // A description key of the event
  "data": "https://example.com/about" // Optional arbitrary context data
}
```

Now, send your event to your endpoint, and see what happens! Remember to include your API token as a bearer token in the request.

```curl
curl -X POST <replace_with_your_endpoint> # [tl! highlight .auth-highlight]
    -H "Accept: application/json"
    -H "Authorization: Bearer <replace_with_your_api_token>"
    -H "Content-Type: application/json"
    -d '{ "event": "test_page_view", "data": "https://example.com/about" }'
```

If all goes well, you will receive a 201 HTTP status code with a JSON response containing the created Event ID.
```json
// HTTP/1.1 201 Created
{
    "message": "Event created",
    "event_id": "96287136-7373-4eb5-af02-72d26fa72f57"
}
```

### Viewing your events
You can see all your events on your events dashboard.
<span class="auth-only inline">Here is a <a href="%%auth_user_events_dashboard%%">link to your events dashboard</a>!</span>

We should now see that the event was added, along with a UTC timestamp. 

| Event Name     |  Context Data             | Timestamp                |
|:---------------|:--------------------------|-------------------------:|
| test_page_view | https://example.com/about |  2022-04-26 20:31:55 UTC |

### Sending events in your app
#### Using Laravel
If you are using Laravel, the [Laravel Client](laravel-client) makes dispatching events easy using the Event facade:

```php
OpenEvents\LaravelClient\Event::dispatch('test_page_view', 'https://example.com/about');
```

#### Other frameworks
Since all we're doing is sending a request with a JSON body can adapt the Curl request to whatever language/framework you are using (and [send a PR](https://github.com/caendesilva/OpenEvents/blob/master/resources/docs/) to update these docs!).


### Validation rules & API limits

The events you send must follow the following validation rules:

```php
[
	'event' => 'required|string|max:32',
	'value' => 'nullable|string|max:128',
];
```

::info The `🌌` symbol means that the text is prefilled with your (`%%auth_user_name%%`) account data.
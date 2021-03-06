<?php

/*
 * Configure your OpenEvents settings here.
 */

return [
	// Your API token
	'token' => env('OPENEVENTS_TOKEN'),

    // Your API endpoint
    'endpoint' => env('OPENEVENTS_ENDPOINT'),

    // Request timeout in seconds
    'timeout' => 3,

    'connection' => \App\Core\Services\SocketConnection::class,
];

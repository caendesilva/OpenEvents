<?php

namespace App\Core\Services;

use OpenEvents\LaravelClient\Event;
use OpenEvents\LaravelClient\Services\Connections\Connection;

/**
 * Store internal events directly to the database.
 * User_id is set to 0 as the connection is only used by this tenant.
 */
class SocketConnection extends Connection
{
    /**
     * @param Event $event
     */
    public function handle(Event $event)
    {
        \App\Models\Event::forceCreate([
            'event' => $event->event,
            'data' => $event->data,
            'user_id' => 0, 
        ]);
    }
}

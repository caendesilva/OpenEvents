<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'uuid' => $this->faker->uuid,
            'user_id' => $this->faker->randomElement(User::all()->pluck('id')->toArray()),
            'event' => $event = $this->constructEventName(),
            'data' => $this->constructDataString($event),
        ];
    }

    private function constructEventName(): string
    {
        if (rand(1, 5) === 1) {
            return $this->faker->randomElement([
                'follow',
                'unfollow',
                'block',
                'unblock',
                'repost',
                'share',
                'mention',
                'message_read',
                'message_delivered',
                'message_seen',
                'message_deleted',
                'message_failed',
                'error',
                'error',
                'error',
                'error',
                'warning',
                'warning',
                'warning',
                'success',
                'success',
                'success',
                'success',
                'success',
            ]);
        }

        $action = $this->faker->randomElement([
            'page',
            'user',
            'team',
            'profile',
            'model',
            'item',
            'subscription',
            'account',
            'payment',
            'post',
            'blog',
            'comment',
            'like',
            'dislike',
            'report',
            'message',
        ]);

        $verb = $this->faker->randomElement([
            'created',
            'created',
            'updated',
            'updated',
            'deleted',
            'viewed',
            'viewed',
            'viewed',
            'purchased',
            'removed',
            'accessed',
            'read',
        ]);

        return $action . '.' . $verb;
    }

    private function constructDataString(string $event): string|null
    { 
        if (strpos($event, '.') !== false) {
            $model = substr($event, 0, strpos($event, '.'));

            // Chance of 25%
            if (rand(1, 4) === 1) {
                return '\App\Models\\' . ucwords($model) . '::class';
            }

            // Chance of 50%
            if (rand(1, 2) === 1) {
                $routeModels = [
                    'post',
                    'page',
                    'comment',
                ];
    
                if (in_array($model, $routeModels)) {
                    return 'https://' . $this->faker->domainName . '/' . $model . '/' . $this->faker->randomNumber(rand(1, 5));
                }
            }
        }

        // If event is an error, return random error message
        if (str_contains($event, 'error')) {
            return $this->faker->randomElement([
                '500 - "Server Error"',
                '501 - "Not Implemented"',
                '502 - "Bad Gateway"',
                '503 - "Out of Resources"',
                '504 - "Gateway Time-Out"',
                '505 - "HTTP Version Not Supported"',
            ]);
        }

        // If event is a warning, return random warning message
        if (str_contains($event, 'warning')) {
            return $this->faker->randomElement([
                '400 - "Bad Request"',
                '401 - "Unauthorized"',
                '402 - "Payment Required"',
                '403 - "Forbidden"',
                '404 - "Not Found"',
                '405 - "Method Not Allowed"',
                '406 - "Not Acceptable"',
                '407 - "Proxy Authentication Required"',
                '408 - "Request Time-Out"',
                '409 - "Conflict"',
                '410 - "Gone"',
                '411 - "Length Required"',
                '412 - "Precondition Failed"',
                '413 - "Request Entity Too Large"',
                '414 - "Request-URL Too Large"',
                '415 - "Unsupported Media Type"',
            ]);
        }

        // If event is a success, return random success message
        if (str_contains($event, 'success')) {
            return $this->faker->randomElement([
                '100 - "Continue"',
                '101 - "Switching Protocols"',
                '200 - "OK"',
                '201 - "Created"',
                '202 - "Accepted"',
                '203 - "Partial Information"',
                '204 - "No Content"',
                '205 - "Reset Content"',
                '206 - "Partial Content"',
                '300 - "Multiple Choices"',
                '301 - "Moved Permanently"',
                '302 - "Moved Temporarily"',
                '303 - "See Other"',
                '304 - "Not Modified"',
                '305 - "Use Proxy"',
            ]);
        }

        return null;
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;

class EventApiController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, string $project)
    {
        try {
			$id = app('HumanoIDGenerator')->generator->parse($project);
		} catch (\RobThree\HumanoID\Exceptions\LookUpFailureException) {
			abort(404);
		}
		
        $user = User::findOrFail($id);
        $project = $user->project();

        $this->authorize('create', [Event::class, $project]);

        $this->validate($request, [
            'event' => 'required|string|max:32',
            'data' => 'nullable|string|max:128',
        ]);

        $event = $user->events()->create([
            'event' => $request->event,
            'data' => $request->data,
            'is_verified' => true,
        ]);

        return response()->json([
            'message' => 'Event created',
            'event_id' => (string) $event->uuid,
        ], 201);
    }
}

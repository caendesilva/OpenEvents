<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PixelController extends Controller
{
    public function show(Request $request, string $project)
    {
        try {
			$id = app('HumanoIDGenerator')->generator->parse($project);
		} catch (\RobThree\HumanoID\Exceptions\LookUpFailureException) {
			return response()->json(['message' => 'Project not found'], 404);
		}
		
        $user = User::findOrFail($id);
        $project = $user->project();

        try {
            $this->validate($request, [
                'event' => 'required|string|max:32',
                'data' => 'nullable|string|max:32', // Pixel events have shorter data strings as they are merged with request data
            ]);
        } catch (\Illuminate\Validation\ValidationException $ex) {
            return response()->json(['message' => $ex->getMessage()], 422);
        }

        // Authorize if the project is active and can receive events


        // Assemble data

        $data = [
            'origin' => 'pixel',
        ];

        if ($request->has('data')) {
            $data['data'] = json_decode($request->input('data'), true) ?? $request->input('data');
        }

        // Check if the request has a HTTP_DNT (do not track) header 
        if ($request->hasHeader('DNT') && $request->header('DNT') == 1) {
            $data['context'] = 'Request has DNT header. No context data is collected.';
        } else {
            $data['context'] = json_decode(HomeController::pineprint($request, 'pixel-'.$project->id.'-'.$request->input('event').$request->input('data')), true);
        }

        $user->events()->create([
            'event' => $request->event ?? 'pixel',
            'data' => json_encode($data),
            'is_verified' => false,
        ]);

        return response(
            base64_decode('iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAAA1BMVEUAAACnej3aAAAAAXRSTlMAQObYZgAAAApJREFUCNdjYAAAAAIAAeIhvDMAAAAASUVORK5CYII='),
            200, 
            [
                'Content-Type' => 'image/png',
                'Cache-Control' => 'no-cache, no-store, must-revalidate',
                'Pragma' => 'no-cache',
                'Expires' => '0',
                'X-Message' => 'OpenEvents care about your privacy. No personal data or tracking information is collected.',
            ]
        );
    }
}

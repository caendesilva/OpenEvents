<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectViewController extends Controller
{
	/**
     * Show the dashboard for a given profile.
     *
     * @param  string  $project HumanoID
     * @return \Illuminate\View\View
     */
	public function show(string $project)
	{
		try {
			$id = app('HumanoIDGenerator')->generator->parse($project);
		} catch (\RobThree\HumanoID\Exceptions\LookUpFailureException) {
			abort(404);
		}

		$project = new Project(User::findOrFail($id));

		return view('project.dashboard', [
			'project' => $project,
		]);
	}
}

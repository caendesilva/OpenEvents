<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectViewController extends Controller
{
	/**
	 * Display the 'Explore' page.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		// Get the latest users
		$users = User::latest()->take(10)->get();

		// Map the users to a new collection
		$projects = $users->map(function ($user) {
			return $user->project();
		});

		return view('project.explore', [
			'projects' => $projects,
		]);
	}

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

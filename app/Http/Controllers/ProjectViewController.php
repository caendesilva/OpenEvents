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
	public function show(string $project, Request $request)
	{
		try {
			$id = app('HumanoIDGenerator')->generator->parse($project);
		} catch (\RobThree\HumanoID\Exceptions\LookUpFailureException) {
			abort(404);
		}

		$project = User::findOrFail($id)->project();

		$limitOptions = [25, 50, 100, 250];
		$selectedLimit = $this->getLimit($request, $limitOptions);

		$query = $project->events()->orderBy('created_at', 'desc')->take($selectedLimit);

		if ($request->has('event')) {
			$query->where('event', 'like', '%' . $request->query('event') . '%');
		}

		return view('project.dashboard', [
			'project' => $project,
			'events' => $query->get(),
		], compact('limitOptions', 'selectedLimit'));
	}

	/**
	 * Get the limit from the request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return int
	 */
	protected function getLimit(Request $request, array $options = [25]): int
	{
		$limit = $request->query('limit', 25);

		if (! in_array($limit, $options)) {
			$limit = 25;
		}

		return $limit;
	}
}

<?php

namespace App\Models;

/**
 * Abstraction for a User as a project
 */
class Project
{
	public string $id;
	public string $name;
	protected User $user;
	protected Collection $events;

	public function __construct(User $user)
	{
		$this->id = $user->humanoID();
		$this->name = $user->name;
		$this->user = $user;
		// @todo implement $this->events = $this->user->events();
	}
}

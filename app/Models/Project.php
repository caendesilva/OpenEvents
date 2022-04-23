<?php

namespace App\Models;

use Illuminate\Support\Collection;

/**
 * Abstraction for a User as a project
 */
class Project
{
	public string $id;
	public string $name;
	protected User $user;

	public function __construct(User $user)
	{
		$this->id = $user->humanoID();
		$this->name = $user->name;
		$this->user = $user;
	}

	public function getEvents(): Collection
	{
		return $this->user->events()->get();
	}

	public static function all(): Collection
	{
		return User::all();
	}
}

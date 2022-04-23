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
	public Collection $events;
	public User $user;

	public function __construct(User $user)
	{
		$this->id = $user->humanoID();
		$this->name = $user->name;
		$this->user = $user;
		$this->events = $user->events;
	}

	public function events(): \Illuminate\Database\Eloquent\Relations\HasMany
	{
		return $this->user->events();
	}

	public function getEndpoint(): string
	{
		return route('events.store', ['project' => $this->id]);
	}

	public static function all(): Collection
	{
		return User::all();
	}
}

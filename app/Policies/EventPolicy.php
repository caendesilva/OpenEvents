<?php

namespace App\Policies;

use App\Models\Event;
use App\Models\Project;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EventPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user, Project $project)
    {
        // @todo implement rules such as request quotas
        
        return $user->id === $project->user->id
            && $user->tokenCan('event:create');
    }


    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Event $event)
    {
        return $user->id === $event->user_id
            && $user->tokenCan('event:delete');
    }
}

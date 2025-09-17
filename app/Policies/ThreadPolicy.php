<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Thread;

class ThreadPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Determina si un usuario tiene acceso a cierta pregunta.
     * 
     * @param  \App\Models\User  $user
     * @param  \App\Models\Thread  $thread
     * @return bool
     */
    public function update(User $user, Thread $thread)
    {
        return $user->id === $thread->user_id;
    }
}

<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Reply;

class ReplyPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Determina si un usuario tiene acceso a cierta pregunta o respuesta.
     * 
     * @param  \App\Models\User  $user
     * @param  \App\Models\Reply  $reply
     * @return bool
     */
    public function update(User $user, Reply $reply)
    {
        return $user->id === $reply->user_id;
    }
}

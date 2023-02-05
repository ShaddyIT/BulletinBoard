<?php

namespace App\Policies;
use App\Models\Bb;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BbPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function update(User $user, Bb $bb){
        return $bb->user->id == $user->id;
    }

    public function delete(User $user, Bb $bb){
        return $bb->user->id == $user->id;
    }
}

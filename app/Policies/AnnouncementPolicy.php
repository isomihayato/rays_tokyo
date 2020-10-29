<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AnnouncementPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */

     public function read(User $user)
     {
       $user_types = {
         'owner',
         'manager',
       };
       return (in_array($user->role, $user_types));
     }
}

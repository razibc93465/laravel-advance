<?php

namespace App\Observers;

use App\Models\User;
use App\Notifications\UserNotify;

class UserObserver
{
    public function created(User $user)
    {
        $user->notify(new UserNotify($user));
    }

    public function updated(User $user)
    {
        $user->notify(new UserNotify($user));
    }

    public function deleted(User $user)
    {
        $user->notify(new UserNotify($user));
    }

    public function restored(User $user)
    {
        //
    }

    public function forceDeleted(User $user)
    {
        //
    }
}

<?php

namespace App\Listeners;

use App\Events\UserLoginHistory;
use App\Models\LoginHistory;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class StoreloginHistory
{

    public function __construct()
    {
        //
    }

    public function handle(UserLoginHistory $event)
    {
        $loginTime = Carbon::now()->toDateTimeString();
        $userDetails = $event->user;
        $input['name'] = $userDetails->name;
        $input['email'] = $userDetails->email;
        $input['login_time'] = $loginTime;
        $saveHistory = LoginHistory::create($input);

        return $saveHistory;
    }
}

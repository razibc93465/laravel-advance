<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CheckUsers extends Command
{

    protected $signature = 'check:users {userId?}';

    protected $description = 'Get count of users';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $total = User::count();
        $userId = $this->argument('userId');

        if ($userId) {
            $user = User::find($userId);
            if ($user) {
                $user->delete();
                $this->info("User {$user->name} removed for (ID: {$user->id}).");
            } else {
                $this->error("User with ID {$userId} not found.");
            }
        } else {
            $this->info("Total User {$total}");
        }
    }
}

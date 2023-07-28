<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CheckUsers extends Command
{

    protected $signature = 'check:users';

    protected $description = 'Get count of users';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        echo User::count() . "\n";
    }
}

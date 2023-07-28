<?php

namespace App\Console\Commands;

use App\Jobs\SendTestGmail;
use Illuminate\Console\Command;

class SendGmail extends Command
{

    protected $signature = 'resend:notification';

    protected $description = 'Email Send Using Schedule';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        dispatch(new SendTestGmail());
    }
}

<?php

namespace App\Http\Controllers;

use App\Jobs\SendTestGmail;
use Illuminate\Http\Request;

class TestQueueJobController extends Controller
{

    public function sendTestMails()
    {
        $emailJobs = new SendTestGmail();
        $this->dispatch($emailJobs);

        dd('Mail Send Success fully');
    }

}

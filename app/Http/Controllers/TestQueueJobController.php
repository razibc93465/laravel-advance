<?php

namespace App\Http\Controllers;

use App\Jobs\SendTestGmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TestQueueJobController extends Controller
{

    public function sendTestMails()
    {
        $emailJobs = new SendTestGmail();
        $this->dispatch($emailJobs);

        dd('Mail Send Successfully');
    }

    public function sendMail()
    {
        $data = array(
            'to' => 'test@queue.job',
            'sub' => 'Mail Send via Schedule',
            'body' => "Mail Body Here",
            'name' => "Test Name"
        );

        Mail::send('mail.testEmail', $data, function ($message) use ($data) {
            $message->to($data['to']);
            $message->subject($data['sub']);
        });
    }
}

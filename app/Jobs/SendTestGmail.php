<?php

namespace App\Jobs;

use App\Http\Controllers\TestQueueJobController;
use App\Mail\TestGmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendTestGmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct()
    {
        //
    }

    public function handle()
    {
        // Using Mail Class
        // $email = new TestGmail();
        // Mail::to('test@queue.job')->send($email);

        // or using Controller function
        (new TestQueueJobController)->sendMail();
    }
}

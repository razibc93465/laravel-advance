<?php

namespace App\Http\Controllers;

use App\Events\NewMessageNotification;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user_id = Auth::user()->id;
        $data = array('user_id' => $user_id);

        return view('broadcast', $data);
    }

    public function send()
    {
        $message = new Message();
        $message->setAttribute('from', 1);
        $message->setAttribute('to', 2);
        $message->setAttribute('message', 'TestMessage from user 1 to user 2');
        $message->save();

        event(new NewMessageNotification($message));
    }
}

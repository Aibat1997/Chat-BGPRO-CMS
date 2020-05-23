<?php

namespace App\Http\Controllers\Index;

use App\Events\MessageSent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Message;

class ChatController extends Controller
{
    public function index()
    {
        $messages = Message::all();
        return view('welcome', compact('messages'));
    }

    public function store(Request $request)
    {
        Message::create([
            'message' => $request->message,
        ]);

        event(new MessageSent($request->message));

        return $request->message;
    }
}

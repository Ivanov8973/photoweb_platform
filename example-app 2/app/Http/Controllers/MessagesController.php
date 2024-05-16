<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Mail;
use App\Mail\PostMail;

class MessagesController extends Controller
{
    public function store(Request $request)
    {
      $validated = $request->validate([
        'name' => 'required',
        'email' => 'required',
        'message_content' => 'required',
    ]);

        Message::create($validated);

        //Send mail only for testing
        Mail::to('kingdev30@gmail.com')->send(new PostMail([
            'name' => $request -> name, 
            'email_from' => $request -> email,
            'message_content' => $request -> message_content
        ]));

        return redirect()->route('photos.index')->with('success', 'Message sent successfully.');
    }

}

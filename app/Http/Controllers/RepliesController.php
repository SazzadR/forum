<?php

namespace App\Http\Controllers;

use App\Thread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RepliesController extends Controller
{
    public function store(Thread $thread, Request $request)
    {
        $thread->addReply([
            'body' => $request->body,
            'user_id' => Auth::user()->id
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;

class RepliesController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');	
	}

    public function store($channelId, Request $request, Thread $thread)
    {
    	$thread->addReply([
	    	'body' => $request['body'],
	    	'user_id' => $thread->user->id,
	    	'thread_id' => $thread->id
    	]);

    	return back();
    }
}

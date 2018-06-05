<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Conversation;
use App\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class MessageController extends Controller
{
    public function show(Request $request) {
    	$id = Auth::user()->id;
    	$conversations = DB::table('conversation')
    		->where('user1_id', $id)
    		->orWhere('user2_id', $id)
    		->orderBy('updated_at', 'desc');
    	$temp = $conversations->get();
    	if ($request->has('conversation')) {
    		$focus = $request->input('conversation');
		}
		else {
			$focus = $conversations->take(1)->value('id');
		}
    	$messages = DB::table('message')
    		->where('conversation_id', $focus)
    		->oldest()
    		->get();
    	$i = 0;
    	foreach ($temp as $key => $value) {
    		if ($value->user1_id == $id) {
    			$name = User::find($value->user2_id)->username;
    			$value->username = $name;
    		}
    		else {
    			$name = User::find($value->user1_id)->username;
    			$value->username = $name;
    		}
    		$message = DB::table('message')
    			->where('conversation_id', $value->id)
    			->oldest();
    		$value->lastMsg = $message->value('content');
    	}
    	foreach ($messages as $key => $value) {
    		$name = User::find($value->user_id)->username;
    		$value->username = $name;
    		if ($value->user_id == $id) {
    			$value->mine = true;
    		}
    		else {
    			$value->mine = false;
    		}
    	}

    	$res = collect(['conversations' => $temp, 'messages' => $messages]);
    	// dd($res);
    	return view('inbox/inboxUser')->with('res', $res);
    }
}
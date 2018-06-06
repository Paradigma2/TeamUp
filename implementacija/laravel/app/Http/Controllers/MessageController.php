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
    	$blocking = DB::table('block')
			->where('user_id', $id)
			->select('userBlocked_id as user_id');
		$blocked = DB::table('block')
			->where('userBlocked_id', $id)
			->select('user_id')
			->union($blocking)
			->get()
			->flatten()
			->all();
    	$array = array_map(function ($data) { return $data->user_id; }, $blocked);
    	$conversations = DB::table('conversation')
    		->whereNotIn('user2_id', $array)
    		->where('user1_id', $id)
    		->orWhere('user2_id', $id)
    		->whereNotIn('user1_id', $array)
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
    			$user = User::find($value->user2_id);
    		}
    		else {
    			$user = User::find($value->user1_id);
    		}
    		$value->username = $user->username;
    		$value->icon = $user->icon;
    		$message = DB::table('message')
    			->where('conversation_id', $value->id)
    			->latest();
    		$value->lastMsg = $message->value('content');
    	}
    	foreach ($messages as $key => $value) {
    		$user = User::find($value->user_id);
    		$value->username = $user->username;
    		$value->icon = $user->icon;
    		if ($value->user_id == $id) {
    			$value->mine = true;
    		}
    		else {
    			$value->mine = false;
    		}
    	}

    	$res = collect(['conversations' => $temp, 'messages' => $messages, 'focus' => $focus]);
    	return view('inbox/inboxUser')->with('res', $res);
    }

    public function post(Request $request) {
    	$id = Auth::user()->id;
    	$focus = $request->input('conversation');
    	$message = new Message;
    	$message->user_id = $id;
    	$message->conversation_id = $focus;
    	$message->content = $request->input('msgToSend');	
        $message->save();
        Conversation::where('id', $focus)->
            update(['updated_at' => $message->updated_at]);
    	return redirect()->action('MessageController@show', ['conversation' => $focus]);
    }
}
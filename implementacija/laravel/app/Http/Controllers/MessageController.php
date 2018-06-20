<?php

namespace App\Http\Controllers;

/* autor: Stevan Tulovic, 45/2015 */

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Conversation;
use App\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

/**
 * MessageController - klasa za prikaz konverzacija, poruka iz odabrane konverzacije i slanje poruka
 *
 * @version 1.0
 */
class MessageController extends Controller
{
    /**
     * Funkcija za prikaz konverzacija i poruka iz odabrane konverzacije
     *
     * @param Request $request
     *
     * @return Response
     */
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
        $untracked = 0;
    	if ($request->has('conversation')) {
    		$focus = $request->input('conversation');
            $conversation = DB::table('conversation')->where('id',$focus);
            $reading = $conversation->first();
            if ($reading->user1_id == $id) {
                if ($reading->user1_read != 1) {
                    $conversation->update(['user1_read' => 1]);
                    $untracked = 1;
                }
            } else {
                if ($reading->user2_read != 1) {
                    $conversation->update(['user2_read' => 1]);
                    $untracked = 1;
                }
            }
		}
		else {
			$focus = $conversations->take(1)->value('id');
            if ($focus != null) {
                $conversation = DB::table('conversation')->where('id',$focus);
                $reading = $conversation->first();
                if ($reading->user1_id == $id) {
                    if ($reading->user1_read != 1) {
                        $conversation->update(['user1_read' => 1]);
                        $untracked = 1;
                    }
                } else {
                    if ($reading->user2_read != 1) {
                        $conversation->update(['user2_read' => 1]);
                        $untracked = 1;
                    }
                }
            }
		}
    	$messages = DB::table('message')
    		->where('conversation_id', $focus)
    		->oldest()
    		->get();
    	$i = 0;
    	foreach ($temp as $key => $value) {
    		if ($value->user1_id == $id) {
    			$user = User::find($value->user2_id);
                $value->read = $value->user1_read;
                if ($focus == $value->id && $untracked > $value->read) {
                    $value->read = $untracked;
                }
    		}
    		else {
    			$user = User::find($value->user1_id);
                $value->read = $value->user2_read;
                if ($focus == $value->id && $untracked > $value->read) {
                    $value->read = $untracked;
                }
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

    /**
     * Funkcija za slanje poruka
     *
     * @param Request $request
     *
     * @return Response
     */
    public function post(Request $request) {
    	$id = Auth::user()->id;
        if ($request->has('conversation')) {
    	   $focus = $request->input('conversation');
        } else {
            return redirect()->back()->with('noConversation', 'Nemate kome da posaljete poruku');
        }
        if (!$request->has('msgToSend')) {
            return redirect()->back()->with('noText', 'Ne mozete poslati praznu poruku');
        }
    	$message = new Message;
    	$message->user_id = $id;
    	$message->conversation_id = $focus;
    	$message->content = $request->input('msgToSend');	
        $message->save();
        $conversation = DB::table('conversation')->where('id',$focus);
        $reading = $conversation->first();
        if ($reading->user1_id == $id) {
            $conversation->update(['user2_read' => 0, 'updated_at' => $message->updated_at]);
        } else {
            $conversation->update(['user1_read' => 0, 'updated_at' => $message->updated_at]);
        }
    	return redirect()->action('MessageController@show', ['conversation' => $focus]);
    }

    public function novaporuka(){
         $id=Auth::user()->id;
         $neprocitane1 = Conversation::where('user1_id', $id)->where('user1_read', 0)->get();
         $nova = "nova";
         if(count($neprocitane1)==0){
             $neprocitane2 = Conversation::where('user2_id', $id)->where('user2_read', 0)->get();
            if(count($neprocitane2)==0){
                 $nova="nema";
            }
         }
         echo $nova;
    
    }
}
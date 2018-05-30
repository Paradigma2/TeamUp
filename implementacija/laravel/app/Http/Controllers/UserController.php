<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function index(){
    	
    	$u=User::all();
    	return view('users_test.index')->with('u',$u);
    }

    public function registerUser(Request $request){

    	$this->validate($request,[
    		'username' => 'required|unique:user,Username',
    		'pass' => 'required',
    		'passConfirm' => 'required',
    		'lolUsername' => 'required|unique:user,LoLNick',
    	]);

    	$user = new User();
    	$user->UserID = 8;
    	$user->Username = $request->input("username");
    	$user->Password = $request->input("pass");
    	$user->Online = 1;
    	$user->isAdmin = 0;
    	$user->isMod=0;
    	$user->LoLNick = $request->input("lolUsername");
    	$user->Lvl = 1; //sredi
    	$user->RankID=1;//sredi
    	$user->save();

    	$credentials = ['Username' => $request->input("username"), 'Password' => $request->input("pass")];

        if (Auth::attempt($credentials)) {
          return "jeej";
        }
        else{
        	return "cao";
        }
    	
    }

    

    	
}

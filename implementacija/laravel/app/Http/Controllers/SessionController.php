<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;
use Validator;


use Illuminate\Foundation\Auth\AuthenticatesUsers;


class SessionController extends Controller
{
    use AuthenticatesUsers;
    public function create(Request $request){
    	$this->validate($request,[
    		'username'		=>'required',
    		'password'  	=>'required',
    	]);

    	$username=$request->get('username');

    	$password=$request->get('password');
    	$credentials = [
            'username' => $request['username'],
            'password' => $request['password'],
        ];

    	//$checkLogin= User::where('Username',$username)->where('Password',$password)->first();
    	//count($checkLogin)>0

    	
    //	if (Auth::login($checkLogin)) {
    	// 	echo "da";
    		//return  redirect('users/UserController');
    //	}else{
    //		
    //		return back()->withErrors("Pogrešan username ili password!");
    //	}
    	
    	if (Auth::attempt(['username' => $username, 'password' => $password])) {
    		
    		return  redirect('users');
    	}else{
    		
    		return back()->withErrors("Pogrešan username ili password!");
    	}
    	/* if (Auth::attempt($credentials)) {
    	 	echo "da";
    		//return  redirect('users/UserController');
    	}else{
    		
    		return back()->withErrors("Pogrešan username ili password!");
    	}
*/


    }

    
    public function destroy(){
    	auth()->logout();
    	return redirect()->home();
    }
}

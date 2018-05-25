<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
    public function index(){
    	
    	$u=User::all();
    	return view('users_test.index')->with('u',$u);
    }
    	
}

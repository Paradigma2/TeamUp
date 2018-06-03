<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


class CreateEditAdController extends Controller
{
    public function showFormAd(){
    	return view('profile/forms/createEditAdForm');
    }

    public function createAd(Request $request){
    	
    	$this->validate($request,[
            'opis' =>'required'	
          
        ]);
        $opis=$request->opis;
        $mod=$request->mod;
        $pozicija=$request->pozicija;


    }
}

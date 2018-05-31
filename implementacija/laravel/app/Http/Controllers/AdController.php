<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Ad;
use App\Mode;
use App\Position;
use App\User;

class AdController extends Controller
{
	public function search(Request $request) {
		$ads = DB::table('ad');
		$ads = $ads->join('user', 'user_id', '=', 'user.id');
		if ($request->input('minRank') > 0) {
			$ads = $ads->where('user.rank_id', '>', $request->input('minRank'));
		}
		if ($request->input('maxRank') > 0) {
			$ads = $ads->where('user.rank_id', '<', $request->input('maxRank'));
		}
		if ($request->input('minLevel') > 0) {
			$ads = $ads->where('user.level', '>', $request->input('minLevel'));
		}
		if ($request->input('maxLevel') > 0) {
			$ads = $ads->where('user.level', '<', $request->input('maxLevel'));
		}
		if ($request->input('gameMode') > 0) {
			$ads = $ads->where('mode_id', $request->input('gameMode'));
		}
		if ($request->input('position') > 0) {
			$ads = $ads->where('position_id', $request->input('position'));
		}
		$ads = $ads->get();
        return view('search/search')->with('ads', $ads);


        // $ads = Ad::all();
        // if ($request->input('gameMode') > 0) {
        	// return $request->input('gameMode');
			// $ads = $ads->where('mode_id', $request->input('gameMode'));
		// }
		// if ($request->input('position') > 0) {
			// return $request->input('position');
			// $ads = $ads->where('position_id', $request->input('position'));
		// }
        // return view('search/search')->with('ads', $ads);
	}
    
}

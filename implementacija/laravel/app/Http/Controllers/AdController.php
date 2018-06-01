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
	public function search(Request $request) 
	{
		$ads = DB::table('ad');
		$ads->join('user', 'user_id', '=', 'user.id');
		if ($request->input('minRank') > 0) {
			$ads->where('user.rank_id', '>', $request->input('minRank'));
		}
		if ($request->input('maxRank') > 0) {
			$ads->where('user.rank_id', '<', $request->input('maxRank'));
		}
		if ($request->input('minLevel') > 0) {
			$ads->where('user.level', '>', $request->input('minLevel'));
		}
		if ($request->input('maxLevel') > 0) {
			$ads->where('user.level', '<', $request->input('maxLevel'));
		}
		if ($request->input('gameMode') > 0) {
			$ads->where('mode_id', $request->input('gameMode'));
		}
		if ($request->input('position') > 0) {
			$ads->where('position_id', $request->input('position'));
		}
		$res = $ads;
		$ads = $ads->get();
		$res = $res->select('ad.description as ad_description', 'user.description as user_description', 'user.username', 'user.online', 'user.lolNick', 'user.level');
		$res = $res->get();
		$i = 0;
		foreach ($ads as $key => $value) {
			$ad = Ad::find($value->id);
			$temp = $res->get($i++);
			$temp->position = $ad->position()->value('name');
			$temp->mode = $ad->mode()->value('name');
			$user = User::find($ad->user()->value('id'));
			$temp->rank = $user->rank()->value('name');
		}
        return view('search/search')->with('ads', $res);
	}
    
}

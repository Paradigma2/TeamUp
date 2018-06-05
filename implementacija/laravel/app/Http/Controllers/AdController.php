<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Ad;
use App\Mode;
use App\Position;
use App\User;
use App\Mastery;
use App\Champion;
use App\Block;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AdController extends Controller
{
	public function search(Request $request) 
	{	
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
		$ads = DB::table('ad')
			->latest()
			->where('user_id', '<>', $id)
			->whereNotIn('user_id', $array);
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
		$ads = $ads->select('ad.id as id', 'user_id', 'position_id', 'mode_id', 'mastery1_id', 'mastery2_id', 'mastery3_id', 'ad.created_at as created_at', 'ad.updated_at as updated_at')->get();
		$res = $res->select('ad.user_id', 'ad.description as ad_description', 'user.description as user_description', 'user.username', 'user.online', 'user.lolNick', 'user.level', 'user.icon', 'ad.created_at as created_at', 'ad.updated_at as updated_at');
		$res = $res->get();
		$i = 0;
		foreach ($ads as $key => $value) {
			$ad = Ad::find($value->id);
			$temp = $res->get($i++);
			$temp->position = $ad->position()->value('name');
			$temp->mode = $ad->mode()->value('name');
			$user = User::find($ad->user()->value('id'));
			$temp->rank = $user->rank()->value('name');

			$mastery = Mastery::find($value->mastery1_id)->first();
			$temp->points1 = $mastery->points;
            $temp->lvl1 = $mastery->level;
            $temp->champ1 = Champion::find($mastery->champion_id)->value('icon');
            if($ad->mastery2_id!=null){
                $mastery = Mastery::find($value->mastery2_id)->first();
                if ($mastery != null) {
                	$temp->points2 = $mastery->points;
                	$temp->lvl2 = $mastery->level;
                	$temp->champ2 = Champion::find($mastery->champion_id)->value('icon');
                }
            }
            else{
                $temp->champ2 = null;
            }
            if($ad->mastery3_id!=null){
                $mastery = Mastery::find($value->mastery3_id)->first();
                if ($mastery != null) {
                	$temp->points3 = $mastery->points;
                	$temp->lvl3 = $mastery->level;
                	$temp->champ3 = Champion::find($mastery->champion_id)->value('icon');
                }
            }
            else{
                $temp->champ3 = null;
            }
		}
		// dd($res);
        return view('search/search')->with('ads', $res);
	}
    
}

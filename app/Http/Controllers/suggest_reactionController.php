<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\suggest_reaction;
use App\Models\schedule;
use App\Models\reaction;
use Illuminate\Support\Facades\Session;

class suggest_reactionController extends Controller
{


    public function calendar()
    {
        return view('calendar');
    }

    public function list(Request $request)
    {

        $all = $request->all();
        $request->session()->start();
        $id = Session::get('id');
        // リアクションするボタンが押下された場合
        if(isset($all['reaction']) && $all['reaction'] == true) {
        // 中間テーブルにリアクションを保存
        $reaction = new reaction;
        $reaction->users_id = $id;
        $reaction->schedules_id = $request->schedule_id;
        $reaction->reaction_flg = true;
        $reaction->save();
        }

        $schedules = schedule::where('start_date' , '>' ,date("Y/m/d"))->orderBy('start_date', 'asc')->get();
        $reactions = reaction::where('users_id' , $id)->get();
        return view('suggest_reaction.list',['schedules'=> $schedules, 'reactions' => $reactions]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\suggest_reaction;

class suggest_reactionController extends Controller
{
    public function list()
    {
        return view('suggest_reaction.list');
    }

    /**
     * イベントを登録
     *
     * @param  Request  $request
     */
    public function scheduleAdd(Request $request)
    {
        // バリデーション
        $request->validate([
            'start_date' => 'required|integer',
            'event_name' => 'required|max:32',
        ]);

        // 登録処理
        $suggest_reaction = new suggest_reaction;
        // 日付に変換。JavaScriptのタイムスタンプはミリ秒なので秒に変換
        $suggest_reaction->start_date = date('Y-m-d', $request->input('start_date') / 1000);
        $suggest_reaction->event_name = $request->input('event_name');
        $suggest_reaction->event_name = $request->input('content');
        $suggest_reaction->reaction_count = $request->input('content');
        $suggest_reaction->save();

        return;
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\suggest_reaction;
use App\Models\schedule;
use App\Models\reaction;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class suggest_reactionController extends Controller
{


    public function calendar()
    {
        return view('calendar');
    }


    /**
     * 提案一覧画面
     *
     * @param Request $request
     * @return void
     */
    public function list(Request $request)
    {

        $request->session()->start();
        $users_id = Session::get('id');
        // 提案一覧を取得
        $schedules = DB::table('reactions')
            ->select(
                's.id as id',
                's.start_date',
                's.suggestion_id',
                'event_name',
                DB::raw('MAX(reactions.users_id = ' . $users_id . ') AS reaction_flg'))
            ->selectRaw('COUNT(reactions.schedules_id) as reaction_counter')
            ->rightJoin('schedules as s', 's.id', '=', 'reactions.schedules_id')
            ->where('s.hold_flg' , false)
            ->groupBy(
                'reactions.schedules_id',
                's.id' ,
                's.start_date',
                's.suggestion_id',
                'event_name'
                )
            ->orderBy('start_date', 'asc')
            ->get();
            $schedules = json_decode(json_encode($schedules), true);
        return view('suggest_reaction.list',['schedules'=> $schedules,'users_id' => $users_id]);
    }

    /**
     * 完了画面
     *
     * @param Request $request
     * @return void
     */
    public function result(Request $request)
    {
        $all = $request->all();
        $request->session()->start();
        $users_id = Session::get('id');
        // 参加するボタンが押下された場合
        if(isset($all['reaction']) && $all['reaction'] == 'add_reaction') {
            $this->addReaction($users_id, $request);
            $messege_title = 'add_reaction_title';
            $messege = 'add_reaction';
        }elseif(isset($all['reaction']) && $all['reaction'] == 'delete_reaction') {
            $this->deleteReaction($users_id, $request);
            $messege_title = 'cancel_reaction_title';
            $messege = 'cancel_reaction';
        }

        // 提案確定
        if(isset($all['suggest']) && $all['suggest'] == 'suggest_decision') {
            $this->scheduleDecision($request);
            $messege_title = 'hold_decision_title';
            $messege = 'hold_decision';
        }elseif(isset($all['suggest']) && $all['suggest'] == 'suggest_delete') {
            $this->deleteSchedule($request);
            $messege_title = 'cancel_suggest_title';
            $messege = 'cancel_suggest';
        }

        // 二重投稿防止
        $request->session()->regenerateToken();
        return view('suggest_reaction.result',['messege_title'=> $messege_title,'messege' => $messege]);
    }

    /**
     * 参加登録
     *
     * @param [type] $users_id
     * @param [type] $request
     * @return void
     */
    public function addReaction($users_id, $request)
    {
        $reaction = new reaction;
        $reaction->users_id = $users_id;
        $reaction->schedules_id = $request->schedule_id;
        $reaction->save();
    }

    /**
     * 参加の取り消し（物理削除）
     *
     * @param [type] $users_id
     * @param [type] $request
     * @return void
     */
    public function deleteReaction($users_id, $request)
    {

        $reaction = new reaction;
        $schedules_id = $request->schedule_id;
        $reaction->where('users_id', $users_id)
            ->where('schedules_id', $schedules_id)
            ->delete();
    }


    /**
     *提案の確定
     *
     * @param [type] $request
     * @return void
     */
    public function scheduleDecision($request)
    {
        $schedule = new schedule;
        $schedules_id = $request->schedule_id;
        $schedule->where('id', $schedules_id)->update(['hold_flg' => true]);
    }

    /**
     *提案の削除（物理削除）
     *
     * @param [type] $request
     * @return void
     */
    public function deleteSchedule($request)
    {

        $schedule = new schedule;
        $schedules_id = $request->schedule_id;
        $schedule->where('id', $schedules_id)->delete();
    }
}

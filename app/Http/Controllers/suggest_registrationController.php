<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\suggest_reaction;
use App\Models\schedule;
use App\Models\reaction;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class suggest_registrationController extends Controller
{
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
                DB::raw('MAX(reactions.users_id = ' . $users_id . ') AS reaction_flg')
            )
            ->selectRaw('COUNT(reactions.schedules_id) as reaction_counter')
            ->rightJoin('schedules as s', 's.id', '=', 'reactions.schedules_id')
            ->where('s.hold_flg', false)
            ->groupBy(
                'reactions.schedules_id',
                's.id',
                's.start_date',
                's.suggestion_id',
                'event_name'
            )
            ->orderBy('start_date', 'asc')
            ->get();
        $schedules = json_decode(json_encode($schedules), true);
        return view('suggest_registration.list', ['schedules' => $schedules, 'users_id' => $users_id]);
    }
}

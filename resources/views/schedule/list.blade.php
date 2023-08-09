@extends('layouts.app')

@section('title', '報告登録')

@section('content')

<div style="max-width:80%; margin: auto">
    <div class="bg-secondary text-white text-center" style="height: 40px; width: 150px; margin-bottom: 30px;">
        <p class="" style="padding: 10px;">スケジュール一覧</p>
    </div>
    <div class="select_day">
        <h2 id="schedule_day">{{ date("Y/m/d") }}</h2>
        <input type="date" id="selected_day" onchange="change_day()" value="">
    </div>
    @foreach ($schedules as $val)
        <div class="list" >
            <table class="table table-striped " border="1">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-center" style="vertical-align: middle; width: 20%;">
                            上映開始時間
                        </th>
                        <td>
                            上映時間（mm/dd/hh）
                        </td>
                    </tr>
                    <tr>
                        <th class="text-center" style="vertical-align: middle;">
                            作品名
                        </th>
                        <td>
                            {{ $val['event_name']}}
                        </td>
                    </tr>
                    <tr>
                        <th class="text-center" style="vertical-align: middle;">
                            URL
                        </th>
                        <td>
                            <a href="#">ウォッチパーティーのURL</a>
                        </td>
                </thead>
            </table>
        </div>
    @endforeach
</div>
@endsection

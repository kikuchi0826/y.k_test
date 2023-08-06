<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.6/index.global.min.js"></script>
<script src="{{config('const.jsPath')}}calendar.js"></script>

@extends('layouts.app')

@section('title', '報告登録')

@section('content')

<div style="max-width:80%; margin: auto">
    <div class="bg-secondary text-white text-center" style="height: 40px; width: 150px; margin-bottom: 30px;">
        <p class="" style="padding: 10px;">鑑賞提案一覧</p>
    </div>
    @foreach ($schedules as $val)
        <div class="reaction_list" >
            <div>
                <form action="">
                    <input type="hidden"  name="schedule_id" value="{{ $val['id'] }}">
                    <button name="reaction" value='true'>リアクションする</button>
                    <button name="reaction" value='false' disabled>リアクションを取り消す</button>
                    <button name="suggest_cancel" disabled>提案を取り消す</button>
                </form>
            </div>
            <table class="table table-striped " border="1">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-center" style="vertical-align: middle; width: 20%;">
                            開催日
                        </th>
                        <td>
                            {{ $val['start_date'] }}
                        </td>
                    </tr>
                    <tr>
                        <th class="text-center" style="vertical-align: middle; width: 20%;">
                            作品名
                        </th>
                        <td>
                            {{ $val['event_name'] }}
                        </td>
                    </tr>
                    <tr>
                        <th class="text-center" style="vertical-align: middle;">
                            リアクション数（提案者を含む）
                        </th>
                        <td>
                            1人
                        </td>
                    </tr>
                </thead>
            </table>
        </div>
    @endforeach
</div>
@endsection

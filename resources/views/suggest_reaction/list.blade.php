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
                            {{ $val['reaction_counter'] + 1}}人
                        </td>
                    </tr>
                </thead>
            </table>
            <div>
                <form action="{{ url('/suggest_reaction/result') }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden"  name="schedule_id" value="{{ $val['id'] }}">
                    @if ($users_id != $val['suggestion_id'])
                        <button class="btn btn-outline-primary btn-sm" name="reaction" value='add_reaction' <?=$val['reaction_flg'] == true ? 'disabled' : ''?>>参加する</button>
                        <button class="delete-action btn btn-outline-danger btn-sm" name="reaction" value='delete_reaction' onclick="return confirm('本当に参加を取り消しますか？')" <?=$val['reaction_flg'] != true ? 'disabled' : ''?>>参加を取り消す</button>
                    @else
                        @if ($val['reaction_counter'] >= 2)
                            <button class="btn btn-outline-primary btn-sm" name="suggest" value='suggest_decision'>開催を確定させる</button>
                        @endif
                        <button class="delete-action btn btn-outline-danger btn-sm" name="suggest" value='suggest_delete' onclick="return confirm('本当に提案を取り消しますか？')">提案を取り消す</button>
                    @endif
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection

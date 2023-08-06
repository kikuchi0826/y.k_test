<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.6/index.global.min.js"></script>
<script src="{{config('const.jsPath')}}calendar.js"></script>

@extends('layouts.app')

@section('title', '報告登録')

@section('content')

<div style="max-width:80%; margin: auto">
    <div class="bg-secondary text-white text-center" style="height: 40px; width: 150px; margin-bottom: 30px;">
        <p class="" style="padding: 10px;">鑑賞提案一覧</p>
    </div>
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
                        作品名
                    </td>
                </tr>
                <tr>
                    <th class="text-center" style="vertical-align: middle;">
                        作品内容
                    </th>
                    <td>
                        <a href="#">ウォッチパーティーのURL</a>
                    </td>
            </thead>
            <tbody>
                {{-- データベースから取得した値が0件だった場合、メッセージを表示 --}}
                    {{-- @foreach ($new_infos as $new_info)
                        <tr>
                            <th class="text-center" style="vertical-align: middle;"></th>
                            <th class="text-center" style="vertical-align: middle;"></th>
                            <th class="text-center" style="vertical-align: middle;"></th>
                            <th class="text-center" style="vertical-align: middle;"></th>
                            <th class="text-center">
                                <a class="btn btn-outline-primary btn-sm" style="margin-right: 3px;" href="">編集</a>
                                <a class="delete-action btn btn-outline-danger btn-sm" style="margin-left: 3px;" href="" onclick="return confirm('本当に削除しますか？')">削除</a>
                            </th>
                        </tr>
                    {{-- @endforeach --}}
            </tbody>
        </table>
    </div>
</div>
@endsection

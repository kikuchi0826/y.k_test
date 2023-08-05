<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.6/index.global.min.js"></script>
<script src="{{config('const.jsPath')}}calendar.js"></script>

@extends('layouts.app')

@section('title', '報告登録')

@section('content')


<div class="calendar" id='calendar'></div>

@endsection

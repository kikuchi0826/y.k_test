@extends('layouts.app')

@section('title', '報告完了')

@section('content')
<div style="max-width:80%; margin: auto">
    <div class="card form-group text-center mt-5 mb-5">
        {{ csrf_field() }}
        <h2 class="mt-5 mb-5">リアクションを受け付けました。</h2>
        <p class="mb-5">
            リアクションありがとうございました！
            みんなで鑑賞同好会を盛り上げていきましょう！
        </p>
    </div>
    <div>
        <a href="{{ url('/suggest_reaction/list') }}">リアクション一覧画面に戻る</a>
    </div>
</div>
@endsection

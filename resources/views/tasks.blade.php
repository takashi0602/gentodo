@extends('layouts.app')

@section('content')
<div class="container">
    <h1>タスク作ったお前♪</h1>
    <div class="tasks_form">
        <form action="">
            <input class="tasks_textBox" type="text">
            <button class="tasks_btn">ボタン</button>
        </form>
    </div>
    <ul class="tasks_lists">
        <li class="tasks_list">
            タスク表示
            <button class="tasks_btn">編集</button>
            <button class="tasks_btn">削除</button>
        </li>
    </ul>
</div>
@endsection
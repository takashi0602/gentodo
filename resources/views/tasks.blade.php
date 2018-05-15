@extends('layouts.app')

@section('content')
<div class="container">
  <h1>タスク作ったお前♪</h1>
  <div class="tasks_form">
    <form action="{{ url('tasks/create') }}" method="POST">
      {{ csrf_field() }}
      <input class="tasks_textBox" type="text" name="task_name">
      <button class="tasks_btn" type="submit">ボタン</button>
    </form>
  </div>
  @if(count($tasks) > 0)
    <ul class="tasks_lists">
      @foreach($tasks as $task)
        <li class="tasks_lists">
          {{ $task->task_name }}
          <form class="tasks_deleteArea" action="{{ url('tasks/' .$task->id) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button class="tasks_btn" type="submit">削除</button>
          </form>
        </li>
      @endforeach
    </ul>
  @else
    <p>タスクを追加してね！</p>
  @endif
</div>
@endsection
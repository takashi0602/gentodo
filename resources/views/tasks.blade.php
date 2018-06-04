@extends('layouts.app')

@section('content')
<div class="c-container">
  <h1>マイタスク</h1>
  <div class="u-mb2">
    <form action="{{ url('tasks/create') }}" method="POST">
      {{ csrf_field() }}
      <input class="c-textbox" type="text" name="task_name">
      <button class="c-btn" type="submit">ボタン</button>
    </form>
  </div>
  @if(count($tasks) > 0)
    <ul class="c-lists u-p0">
      @foreach($tasks as $task)
        <li class="u-mb2">
          {{ $task->task_name }}
          <form class="u-inlineblock" action="{{ url('tasks/' .$task->id) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button class="c-btn" type="submit">削除</button>
          </form>
        </li>
      @endforeach
    </ul>
  @else
    <div class="c-balloon">タスクを追加してね！</div>
    <div class="c-image_penguin"></div>
  @endif
</div>
@endsection
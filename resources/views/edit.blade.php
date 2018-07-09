@extends('layouts.app')

@section('content')
<section>
  <h1>編集</h1>
  <div class="u-mb2">
    <form action="{{ url('tasks/update') }}" method="POST">
      <span>タスク名</span>
      <input class="c-textbox u-mb3 u-block u-px1" type="text" name="task_name" value="{{ $task->task_name }}">
      <span>タスク説明</span>
      <textarea class="c-textarea u-block u-px1 u-mb1" name="task_description" rows="3" cols="30">{{ $task->task_description }}</textarea>
      <button class="c-btn" type="submit">編集</button>
      <input type="hidden" name="id" value="{{ $task->id }}">
      {{ csrf_field() }}
    </form>
  </div>
</section>
@endsection
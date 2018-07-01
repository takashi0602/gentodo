@extends('layouts.app')

@section('content')
<section>
  <div>
    <h1>編集</h1>
    <div class="u-mb2">
      <form action="{{ url('tasks/update') }}" method="POST">
        <input class="c-textbox" type="text" name="task_name" value="{{ $task->task_name }}">
        <button class="c-btn" type="submit">編集</button>
        <input type="hidden" name="id" value="{{ $task->id }}">
        {{ csrf_field() }}
      </form>
    </div>
  </div>
</section>
@endsection
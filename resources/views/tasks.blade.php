@extends('layouts.app')

@section('content')
<section>
  <div>
    <h1>マイタスク</h1>
    <div class="u-mb2">
      <form action="{{ url('tasks/create') }}" method="POST">
        {{ csrf_field() }}
        <input class="c-textbox" type="text" name="task_name">
        <button class="c-btn" type="submit">作成</button>
      </form>
    </div>
    @if(count($tasks))
      <ul class="c-lists u-p0">
        @foreach($tasks as $task)
          <li class="u-mb2">
            {{ $task->created_at->format('m月d日') }}
            {{ $task->task_name }}
            <form class="u-inlineblock" action="{{ url('tasks/complete/') }}" method="POST">
              {{ csrf_field() }}
              <button class="c-btn" type="submit">達成</button>
              <input type="hidden" name="id" value="{{ $task->id }}">
            </form>
            <form class="u-inlineblock" action="{{ url('tasks/edit/' .$task->id) }}" method="POST">
              {{ csrf_field() }}
              <button class="c-btn" type="submit">編集</button>
            </form>
            <form class="u-inlineblock" action="{{ url('tasks/delete/' .$task->id) }}" method="POST">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
              <button class="c-btn" type="submit">削除</button>
            </form>
          </li>
        @endforeach
      </ul>
      <div class="c-balloon">現在のタスクは{{ count($tasks) }}コあります。頑張って！</div>
      <div class="c-image_penguin2"></div>
    @else
      <div class="c-balloon">タスクを追加してね！</div>
      <div class="c-image_penguin1"></div>
    @endif
  </div>
</section>
@endsection
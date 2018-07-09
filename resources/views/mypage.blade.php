@extends('layouts.app')

@section('content')
<section>
  <h1 class="u-mb3">マイページ</h1>
  @foreach($user as $u)
    <div>
      <span>称号：</span>
      <div class="u-inlineblock">{{ $title }}</div>
    </div>
    <div class="u-mb3">
      <span>名前：</span>
      <div class="u-inlineblock">{{ $u->name }}</div>
    </div>
  @endforeach
  @if(count($tasks))
    <h3>達成したタスク</h3>
    <ul class="c-lists u-p0">
      @foreach($tasks as $task)
        <li>
          {{ $task->updated_at->format('m月d日') }}
          <span class="u-break-word">{{ $task->task_name }}</span>
        </li>
        <p class="u-break-word">{{ $task->task_description }}</p>
      @endforeach
    </ul>
    <div class="c-balloon">達成したタスクは{{ count($tasks) }}コあります。頑張ってるね！</div>
    <div class="c-image_penguin7"></div>
  @else
    <div class="c-balloon">まだタスクを達成してないよ。頑張って！</div>
    <div class="c-image_penguin1"></div>
  @endif
</section>
@endsection
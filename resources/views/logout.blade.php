@extends('layouts.app')

@section('content')
<section>
  <div>
    <p>ログアウトしますか？</p>
    <a class="" href="{{ route('logout') }}"
       onclick="event.preventDefault();
       document.getElementById('logout-form').submit();">
      {{ __('はい') }}
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
    </form>
    <a class="" href="{{ url('/tasks') }}">戻る</a>
  </div>
</section>
@endsection
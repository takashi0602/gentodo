<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>GenTodo</title>
  <script src="{{ asset('js/app.js') }}" defer></script>
  <link rel="dns-prefetch" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
  <div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel u-px0">
      <div class="c-container d-flex u-space_between u-wrap">
        <a class="navbar-brand" href="{{ url('/') }}">GenTodo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav mr-auto"></ul>
          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
            @guest
              <li><a class="nav-link" href="{{ route('login') }}">{{ __('サインイン') }}</a></li>
              <li><a class="nav-link" href="{{ route('register') }}">{{ __('サインアップ') }}</a></li>
            @else
              <li><a class="nav-link" href="{{ url('/tasks') }}">タスク</a></li>
              <li><a class="nav-link" href="{{ url('/tasks/mypage') }}">マイページ</a></li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="{{ url('/logout') }}">ログアウト</a>
              </li>
            @endguest
          </ul>
        </div>
      </div>
    </nav>
    <main class="py-4 c-container">
      @yield('content')
    </main>
  </div>
</body>
</html>

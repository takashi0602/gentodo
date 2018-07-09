@extends('layouts.app')

@section('content')
<section>
  <form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="form-group row">
      <label for="email" class="col-md-4 col-form-label text-md-right">メールアドレス</label>
      <input id="email" type="email" class="c-textbox col-md-6 u-mx1{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
      @if ($errors->has('email'))
        <span class="invalid-feedback">
          <strong>{{ $errors->first('email') }}</strong>
        </span>
        @endif
    </div>
    <div class="form-group row">
      <label for="password" class="col-md-4 col-form-label text-md-right">パスワード</label>
      <input id="password" type="password" class="c-textbox col-md-6 u-mx1{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
        @if ($errors->has('password'))
          <span class="invalid-feedback">
            <strong>{{ $errors->first('password') }}</strong>
          </span>
        @endif
    </div>
    <div class="form-group row u-mb4">
      <div class="col-md-6 offset-md-4">
        <div class="checkbox">
          <label>
            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
            <span class="u-ml1">パスワードを記憶する</span>
          </label>
        </div>
      </div>
    </div>
    <div class="form-group row mb-0">
      <div class="col-md-8 offset-md-4">
        <button type="submit" class="c-btn u-px1">サインイン</button>
      </div>
    </div>
  </form>
</section>
@endsection

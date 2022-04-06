@extends( $auth == 'admin' ? 'layouts.auth' : 'users.layouts.master' )

@section('content')
<div class="login-container auth-container">
  <div class="card-header">{{ __('E-Book Management System') }}</div>
  @if(session()->has('error'))
      <div class="auth-row auth-error">
          {{ session()->get('error') }}
      </div>
  @endif

  @if(session()->has('message'))
      <div class="auth-row auth-success">
          {{ session()->get('message') }}
      </div>
  @endif
  <div class="card-body">
    <form method="POST" action="{{ route('login', $auth ) }}">
      @csrf

      <div class="auth-row">
        <input id="email" type="text" class="auth-input auth-email @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}" autocomplete="off" autofocus>
        <i class="fas fa-envelope fa-md"></i>
        @error('email')
          <span class="auth-error">
            <span>{{ $message }}</span>
          </span>
        @enderror
      </div>
      
      <div class="auth-row">
        <input id="password" type="password" class="auth-input @error('password') is-invalid @enderror" name="password" placeholder="Password">
        <i class="fas fa-key fa-md"></i>
        @error('password')
          <span class="auth-error">
            <span>{{ $message }}</span>
          </span>
        @enderror
      </div>

      <div class="auth-row reset-pass">
        <div class="lt-content">
          <input type="checkbox" name="remember" id="remember" class="auth-checkbox" {{ old('remember') ? 'checked' : '' }}>
          <label for="remember" class="auth-txt">
            {{ __('Remember Me') }}
          </label>
        </div>

        <div class="rt-content">
          <a class="rt-content-link auth-txt" href="{{ route('forget.password' , $auth) }}">
            {{ __('Forgot Your Password?') }}
          </a>
        </div>
      </div>

      <div class="auth-btnrow">
        <button type="submit" class="btn-auth auth-txt">
            {{ __('Sign in') }}
        </button>
      </div>

      <div class="auth-btnrow">
        <span class="auth-txt">Don't have an account?</span>
        <a class="rt-content-link auth-txt" href="{{ route('register' , $auth ) }}">
            {{ __('Register') }}
        </a>
      </div>
    </form>
  </div>
</div>
@endsection

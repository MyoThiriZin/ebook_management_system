@extends('layouts.auth')
  
@section('content')
  <div class="resetpass-container auth-container">
    <div class="card-header">Re-enter your new password</div>
    <div class="card-body">

      <form action="{{ route('submit.reset.password') }}" method="POST">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">

        <div class="auth-row">
          <input type="text" id="email" class="auth-input" name="email" placeholder="Email" value="{{ old('email') }}" autocomplete="off" autofocus>
          <i class="fas fa-envelope fa-md"></i>
          @if ($errors->has('email'))
              <span class="auth-error">{{ $errors->first('email') }}</span>
          @endif
        </div>

        <div class="auth-row">
          <input type="password" id="password" class="auth-input" name="password" placeholder="Password" autocomplete="off" autofocus>
          <i class="fas fa-lock"></i>
          @if ($errors->has('password'))
              <span class="auth-error">{{ $errors->first('password') }}</span>
          @endif
        </div>

        <div class="auth-row">
          <input type="password" id="password-confirm" class="auth-input" name="password_confirmation" placeholder="Confirm password" autocomplete="off" autofocus>
          <i class="fas fa-lock"></i>
          @if ($errors->has('password_confirmation'))
              <span class="auth-error">{{ $errors->first('password_confirmation') }}</span> 
          @endif
        </div>

        <div class="auth-btnrow">
          <button type="submit" class="btn-auth">
              Reset Password
          </button>
        </div>
      </form>
          
    </div>
  </div>
@endsection
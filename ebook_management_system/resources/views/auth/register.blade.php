@extends('layouts.auth')

@section('content')
<div class="register-container auth-container">  
  <div class="card-header">{{ __('Register') }}</div>
  <div class="card-body">
    <form method="POST" action="{{ route('register') }}">
      @csrf

      <div class="auth-row">
          <input id="name" type="text" class="auth-input @error('name') is-invalid @enderror" name="name" placeholder="Name" value="{{ old('name') }}" autocomplete="off" autofocus>
          <i class="fas fa-user"></i>
          @error('name')
            <span class="auth-error">
              <span>{{ $message }}</span>
            </span>
          @enderror
      </div>

      <div class="auth-row">
          <input id="email" type="text" class="auth-input @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}" autocomplete="off">
          <i class="fas fa-envelope fa-md"></i>
          @error('email')
            <span class="auth-error">
              <span>{{ $message }}</span>
            </span>
          @enderror
      </div>

      <div class="auth-row">
          <input id="phone_no" type="number" class="auth-input" name="phone_no" value="{{ old('phone_no') }}" autocomplete="off" placeholder="Phone">
          <i class="fas fa-phone"></i>
          @error('phone_no')
            <span class="auth-error">
              <span>{{ $message }}</span>
            </span>
          @enderror
      </div>

      <div class="auth-row">
          <input id="address" type="text" class="auth-input" name="address" value="{{ old('address') }}" autocomplete="off" placeholder="Address">
          <i class="fa-solid fa-address-card"></i>
          @error('address')
            <span class="auth-error">
              <span>{{ $message }}</span>
            </span>
          @enderror
      </div>

      <div class="auth-row">
          <input id="password" type="password" class="auth-input @error('password') is-invalid @enderror" name="password" placeholder="Password" autocomplete="new-password">
          <i class="fas fa-lock"></i>
          @error('password')
            <span class="auth-error">
              <span>{{ $message }}</span>
            </span>
          @enderror
      </div>

      <div class="auth-row">
          <input id="password-confirm" type="password" class="auth-input" name="password_confirmation" placeholder="Confirm password" autocomplete="new-password">
          <i class="fas fa-lock"></i>
          @error('password_confirmation')
            <span class="auth-error">
              <span>{{ $message }}</span>
            </span>
          @enderror
      </div>

      <div class="auth-btnrow">
          <button type="submit" class="btn-auth">
            {{ __('Sign up') }}
          </button>
      </div>

      <div class="auth-btnrow">
        <span>Already have an account?</span>
        <a class="rt-content-link" href="{{ route('login') }}">
            {{ __('Log in') }}
        </a>
      </div>
    </form>
  </div>
</div>
@endsection
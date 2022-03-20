@extends('layouts.auth')
@section('content')
  <div class="forgetpass-container auth-container">
    <div class="card-header">Reset Password</div>
    <div class="card-body">

      @if (Session::has('message'))
        <div class="auth-row auth-success">
          {{ Session::get('message') }}
        </div>
      @endif

      <form action="{{ route('submit.forget.password') }}" method="POST">
        @csrf
        <div class="auth-row">
          <input type="text" id="email" class="auth-input" name="email" placeholder="Email" autocomplete="off" autofocus>
          <i class="fas fa-envelope fa-md"></i>
          @if ($errors->has('email'))
              <span class="auth-error">{{ $errors->first('email') }}</span>
          @endif
        </div>

        <div class="auth-btnrow">
          <button type="submit" class="btn-forgotpass">
              Send Password Reset Link
          </button>
        </div>

        <div class="auth-btnrow">
          <a class="rt-content-link auth-txt" href="{{ route('login') }}">
              {{ __('Log in') }}
          </a>
        </div>
      </form>
    </div>
  </div>
@endsection
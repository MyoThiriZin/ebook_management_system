@extends('layouts.master')

@section('content')

<h2 class="form-title">Admin Profile</h2>

<div class="form-sec">
  <form action="{route{''}}" method="POST" class="form-control">
<div class="container-profile-suan">
<label for="">Name:{{ $admininfo()->name }} </label><br>
<label for="">Email:{{ $admininfo()->email }} </label><br>
<label for="">Address:{{ $admininfo()->address }} </label><br>
<label for="">Type of user: {{ $admininfo()->type }} </label><br>
<label for="">Password: {{ $admininfo()->password }}</label><br>
<label for="">Account Created Date:{{ $admininfo()->created_by }} </label><br>
</div>
  </form>
</div>

@endsection
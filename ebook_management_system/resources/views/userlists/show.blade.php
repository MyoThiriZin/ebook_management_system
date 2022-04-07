@extends('layouts.master')
@section('content')
<div class="seemore">
  <div class=" clearfix">
    <a href="{{ route('users.index') }}"><button class="back-btn ft-left"><i class="fa-fw fas fa-backward"></i>Back</button></a>
  </div>
  <div class="seemore-container">
    <h2 class="seemore-ttl">User Information</h2>
    <div class="seemore-item">
      <label for="">ID :</label><span>{{ $user->id }}</span>
    </div>
    <div class="seemore-item">
      <label for="" class="">Name :</label><span>{{ $user->name }}</span>
    </div>
    <div class="seemore-item">
      <label for="">Email :</label><span>{{ $user->email }}</span>
    </div>
    <div class="seemore-item">
      <label for="">Address :</label><span>{{ $user->address }}</span>
    </div>
    <div class="seemore-item">
      <label for="">Phone :</label><span>{{ $user->phone_no }}</span>
    </div>
    <div class="seemore-item">
      <label for="">Role :</label>
      @if($user->type==0)
      <span> Admin </span>
      @else
      <span> User </span>
      @endif
    </div>
  </div>
</div>
@endsection
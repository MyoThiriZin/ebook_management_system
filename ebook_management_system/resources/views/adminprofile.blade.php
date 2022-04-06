@extends('layouts.master')
@section('content')
<div class="seemore">
  <div class="seemore-container">
    <h2 class="seemore-ttl">Admin Profile</h2>
    <div class="seemore-item">
      <label for="" class="profile-name">Name &nbsp;:</label><span class="profile-content">{{ $users->name }}</span>
    </div>
    <div class="seemore-item">
      <label for="" class="profile-name">Email &nbsp;:</label><span class="profile-content">{{ $users->email }}</span>
    </div>
    <div class="seemore-item">
      <label for="" class="profile-name">Phone &nbsp;:</label><span class="profile-content">{{ $users->phone_no }}</span>
    </div>
    <div class="seemore-item">
      <label for="" class="profile-name">Address &nbsp;:</label><span class="profile-content">{{ $users->address }}</span>
    </div>
  </div>
</div>
@endsection

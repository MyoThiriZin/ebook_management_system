@extends('layouts.master')
@section('content')
<div class="seemore">
    <div class="seemore-container">
        <h2 class="seemore-ttl">Admin Profile</h2>
        <div class="seemore-item">
            <label for="" class="">Name :</label><span>{{ $users->name }}</span>
        </div>
        <div class="seemore-item">
            <label for="">Email :</label><span>{{ $users->email }}</span>
        </div>
        <div class="seemore-item">
            <label for="">Phone :</label><span>{{ $users->phone_no }}</span>
        </div>
        <div class="seemore-item">
            <label for="">Address :</label><span>{{ $users->address }}</span>
        </div>
    </div>
</div>
@endsection

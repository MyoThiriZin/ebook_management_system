@extends('layouts.master')
@section('content')
<div class="seemore">
<div class=" clearfix">
    <a href="{{ route('contact.index') }}"><button class="back-btn ft-left"><i class="fa-fw fas fa-backward"></i>Back</button></a>
</div>
    <div class="seemore-container">
        <h2 class="seemore-ttl">Contact Information </h2>
        <div class="seemore-item">
            <label for="">ID :</label><span>{{ $contact->id }}</span>
        </div>
        <div class="seemore-item">
            <label for="" class="">Name :</label><span>{{ $contact->name }}</span>
        </div>
        <div class="seemore-item">
            <label for="">Email :</label><span>{{ $contact->email }}</span>
        </div>
        <div class="seemore-item">
            <label for="">Phone :</label><span>{{ $contact->phone_no }}</span>
        </div>
        <div class="seemore-item">
            <label for="">Password :</label><span>{{ $contact->message }}</span>
        </div>
    </div>
</div>
@endsection

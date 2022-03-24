@extends('users.layouts.master')
@section('content')
  <div class="contact-container">
    @if (session('success_msg'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ session('success_msg') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
    <form action="{{route('user#contact_store')}}" method="POST">
        @csrf
      <div class="contact-input-group">
        <label for="">Name</label>
        <input type="text" name="name" placeholder="Enter Your Name" value="{{old('name')}}">
        @if ($errors->has('name'))
          <small class="text-danger">*{{ $errors->first('name') }}</small>
          @endif
      </div>
      <div class="contact-input-group">
        <label for="">Email</label>
        <input type="email" name="email" placeholder="Enter Your Email" value="{{old('email')}}">
        @if ($errors->has('email'))
          <small class="text-danger">*{{ $errors->first('email') }}</small>
          @endif
      </div>
      <div class="contact-input-group">
        <label for="">Phone No.</label>
        <input type="number" name="phone_no" placeholder="Enter Your Phone Number" value="{{old('phone_no')}}">
        @if ($errors->has('phone_no'))
          <small class="text-danger">*{{ $errors->first('phone_no') }}</small>
          @endif
      </div>
      <div class="contact-textarea-group">
        <span>Message</span>
        <textarea name="message" id="" cols="30" rows="5" class="input-textarea" placeholder="Enter Your Message">{{old('message')}}</textarea>
        @if ($errors->has('message'))
          <small class="text-danger">*{{ $errors->first('message') }}</small>
          @endif
      </div>
     <div class="contact-btn-group">
      <input type="submit" value="Send" class="contact-send-btn">
     </div>
    </form>
  </div>
@endsection

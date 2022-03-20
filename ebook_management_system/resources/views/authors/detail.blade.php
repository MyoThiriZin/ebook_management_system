@extends('layouts.master')

@section('content')

<div class="back-btn-sec"><a href="/authors" class="back-btn">Back</a></div>

<div class="detail-sec"> 
  <div class="title-sec">
    <h3>More Information</h3>
  </div>
  <div class="info-sec">
    <span>ID : {{ $authors->id }}</span><br>
    <span>Author Name : {{ $authors->name }}</span><br>
    <span>Description : {{ $authors->description }}</span>
  </div>
</div>

<script src="/js//library/jquery-3.6.0.min.js"></script>
<script src="/js/authors.js"></script>
@endsection
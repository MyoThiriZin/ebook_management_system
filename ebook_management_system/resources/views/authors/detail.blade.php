@extends('layouts.master')

@section('content')

<div class="seemore">
<div class=" clearfix">
  <a href="/authors"><button class="back-btn ft-left"><i class="fa-fw fas fa-backward"></i>Back</button></a>
</div>
  <div class="seemore-container">
    <h2 class="seemore-ttl">Author Information</h2>
    <div class="seemore-item">
      <label for="">ID :</label><span>{{ $authors->id }}</span>
    </div>
    <div class="seemore-item">
      <label for="" class="">Author Name :</label><span>{{ $authors->name }}</span>
    </div>
    <div class="seemore-item">
      <label for="" class="">Author Email :</label><span>{{ $authors->email }}</span>
    </div>
    <div class="seemore-item clearfix">
      <label for="" class="ft-left">Description :</label><span class="ft-left">{{ $authors->description }}</span>
    </div>
  </div>
</div>

<script src="/js//library/jquery-3.6.0.min.js"></script>
<script src="/js/authors.js"></script>
@endsection

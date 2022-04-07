@extends('layouts.master')
@section('content')

<div class="form-sec">
  @if (session('success_msg'))
  <div class="alert alert-success fade show col-md-4 mx-auto" role="alert">
    {{ session('success_msg') }}
    <a href="{{route('categories')}}" class="ft-right pb-2"><button class="btn-primary btn-sm">OK</button></a>
  </div>
  @endif
  <h2 class="form-title">Create Category</h2>
  <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data" class="clearfix form">
    @csrf
    <div class="clearfix">
      <label for="" class="form-label">Category Name</label>
      <input type="text" name="name" class="name" placeholder="Name">
      @if ($errors->has('name'))
      <small class="text-danger">*{{ $errors->first('name') }}</small>
      @endif
    </div>

    <input type="submit" value="Create" class="create-btn ft-right me-3">
    <input type="button" value="Cancel" class="back-btn ft-right me-3" onclick="window.location='{{ URL::to('categories') }}'" />

  </form>
</div>
@endsection
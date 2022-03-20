@extends('layouts.master')

@section('content')
  <div class="form-sec">
    <h2 class="form-title">Edit Author</h2>
    <form class="form">
      @csrf
      <div class="clearfix">
          <input type="hidden" class="id" value="{{$authors->id}}" name="id"  id="id">
          <label for="name" class="form-label">Name</label>
          <input type="text" name="name" class="name" id="name" placeholder="Name" value="{{ $authors->name }}">
          <small class="text-danger error-text name_err"></small>

          <label for="description" class="form-label">Description</label>
          <textarea name="description" class="description" id="description" placeholder="Description" cols="30" rows="6">{{ $authors->description }}</textarea>
          <small class="text-danger error-text description_err"></small>
      </div>

      <input type="submit" value="Update" class="update-btn" id="update-btn">
    </form>
  </div>
<script src="/js//library/jquery-3.6.0.min.js"></script>
<script src="/js/authors.js"></script>
@endsection
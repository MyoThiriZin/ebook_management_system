@extends('layouts.master')

@section('content')
  <div class="form-sec">
    <h2 class="form-title">Create Author</h2>
    <form class="clearfix form">
      @csrf
      <div class="clearfix">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" class="name" id="name" placeholder="Name">
        <small class="text-danger error-text name_error"></small><br><br>
         
        <label for="description" class="form-label">Description</label>
        <textarea name="description" class="description" id="description" placeholder="Description" cols="30" rows="6"></textarea>
        <small class="text-danger error-text description_error"></small><br><br>
      </div>

      <input type="submit" value="Create" class="create-btn" id="create-btn">
    </form>
  </div>
<script src="/js//library/jquery-3.6.0.min.js"></script>
<script src="/js/authors.js"></script>
@endsection
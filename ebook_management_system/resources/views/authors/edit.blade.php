@extends('layouts.master')

@section('content')
@if (session('success_msg'))
  <div class="alert alert-success fade show col-md-4 mx-auto" role="alert">
    {{ session('success_msg') }}
    <a href="{{route('authors.index')}}" class="ft-right pb-2"><button class="btn-primary btn-sm">OK</button></a>
  </div>
@endif

  <div class="form-sec">
    <h2 class="form-title">Edit Author</h2>
    <form class="form">
      @csrf
      <div class="clearfix">
        <input type="hidden" class="id" value="{{$authors->id}}" name="id"  id="id">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" class="name" id="name" placeholder="Name" value="{{ $authors->name }}">
        <small class="text-danger error-text name_err"></small><br><br>

        <label for="email" class="form-label">Email</label>
        <input type="text" name="email" class="email" id="email" placeholder="Email"  value="{{ $authors->email }}">
        <small class="text-danger error-text email_err"></small><br><br>

        <label for="description" class="form-label">Description</label>
        <textarea name="description" class="description" id="description" placeholder="Description" cols="30" rows="6">{{ $authors->description }}</textarea>
        <small class="text-danger error-text description_err"></small><br><br>

        <input type="hidden" name="created_by" class="created_by" id="created_by" value="{{ Auth::user()->id }}">
        <input type="hidden" name="updated_by" class="updated_by" id="updated_by" value="{{ Auth::user()->id }}">
      </div>

      <input type="submit" value="Update" class="update-btn" id="update-btn">
      <input type="button" value="Cancel" class="back-btn" onclick="window.location='{{ URL::to('authors') }}'" />
    </form>
  </div>
<script src="/js//library/jquery-3.6.0.min.js"></script>
<script src="/js/authors.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
      $('#name').keydown(function (e) {
        if(e.keyCode == 188) {
          e.preventDefault();
        }
      })
    });
</script>
@endsection

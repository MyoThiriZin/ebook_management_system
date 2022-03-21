@extends('layouts.master')
@section('content')
<div class="form-sec">
    <h2 class="form-title">Edit Category</h2>
    <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data" class="form">
      @csrf
      @method("PUT")
      <div class="clearfix">
        <div class="col">
          <label for="" class="form-label">Category Name</label>
          <input type="text" name="name" class="name" placeholder="Name" value="{{ $category->name }}">
          @if ($errors->has('name'))
              <small class="text-danger">*{{ $errors->first('name') }}</small>
          @endif
        </div>
      </div>
      <input type="submit" value="Update" class="create-btn">
    </form>
  </div>
@endsection
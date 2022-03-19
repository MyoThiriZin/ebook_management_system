@extends('layouts.master')

@section('content')
  <div class="form-sec">
    <h2 class="form-title">Create Book</h2>
    <form action="{{url('/books')}}" method="POST" enctype="multipart/form-data" class="clearfix form">
      @csrf
      <div class="clearfix">
        <div class="col">
          <label for="" class="form-label">Name</label>
          <input type="text" name="name" class="name" placeholder="Name">
          @if ($errors->has('name'))
          <small class="text-danger">*{{ $errors->first('name') }}</small>
          @endif
        </div>

        <div class="col">
          <label for="" class="form-label">Duration</label>
          <input type="text" name="duration" class="duration" placeholder="Duration">
          @if ($errors->has('duration'))
          <small class="text-danger">*{{ $errors->first('duration') }}</small>
          @endif
        </div>
      </div>

      <div class="clearfix">
        <div class="col">
          <label for="" class="form-label">Book Image</label>
          <input type="file" name="image" class="myfile" placeholder="Book Image">
          @if ($errors->has('image'))
          <small class="text-danger">*{{ $errors->first('image') }}</small>
          @endif
        </div>

        <div class="col">
          <label for="" class="form-label">PDF file</label>
          <input type="file" name="file" class="myfile">
          @if ($errors->has('file'))
          <small class="text-danger">*{{ $errors->first('file') }}</small>
          @endif
        </div>
        
    </div>

    <div class="clearfix">
        <div class="col">
          <label for="" class="form-label">Author</label>
          <select name="author_id" class="author" >
              <option value="">Choose Author</option>
              @foreach ($authors as $key => $value)
                  <option value="{{ $key }}">{{ $value }}</option>
              @endforeach
          </select>
          @if ($errors->has('author_id'))
          <small class="text-danger">*{{ $errors->first('author_id') }}</small>
          @endif
        </div>

        <div class="col">
          <label for="" class="form-label">Category</label>
          <select name="category_id" class="category">
              <option value="">Choose Category</option>
              @foreach ($categories as $key => $value)
                  <option value="{{ $key }}">{{ $value }}</option>
              @endforeach
          </select>
          @if ($errors->has('category_id'))
          <small class="text-danger">*{{ $errors->first('category_id') }}</small>
          @endif
        </div>
      </div>

      <div class="clearfix">
        <div class="col">
          <label class="form-label">Book Description</label>
          <textarea name="description" class="description" placeholder="Description" cols="30" rows="6"></textarea>
          @if ($errors->has('description'))
          <small class="text-danger">*{{ $errors->first('description') }}</small>
          @endif
        </div>
      </div>

      <input type="submit" value="Create" class="create-btn">
    </form>
  </div>
@endsection

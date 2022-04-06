@extends('layouts.master')
@section('content')
  <div class="form-sec">
    @if (session('success_msg'))
      <div class="alert alert-success fade show col-md-4 mx-auto" role="alert">
          {{ session('success_msg') }}
        <a href="{{ route('books.index') }}" class="ft-right pb-2"><button
                class="btn-primary btn-sm">OK</button></a>
      </div>
    @endif

    <div class="form-sec">
      <h2 class="form-title">Create Book</h2>
      <form action="{{ url('/books') }}" method="POST" enctype="multipart/form-data" class="clearfix form">
        @csrf
        <div class="clearfix">
          <div class="col">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="name" placeholder="Name"
                value="{{ old('name') }}">
            @if ($errors->has('name'))
                <small class="text-danger">*{{ $errors->first('name') }}</small>
            @endif
          </div>

          <div class="col">
            <label for="duration" class="form-label">Duration</label>
            <input type="number" name="duration" class="duration" placeholder="Duration"
                value="{{ old('duration') }}">
            @if ($errors->has('duration'))
                <small class="text-danger">*{{ $errors->first('duration') }}</small>
            @endif
          </div>
        </div>

        <div class="clearfix">
          <div class="col">
            <label for="image" class="form-label">Book Image</label>
            <input type="file" accept="image/gif, image/jpeg, image/png" name="image" class="myfile"
                placeholder="Book Image">
            @if ($errors->has('image'))
                <small class="text-danger">*{{ $errors->first('image') }}</small>
            @endif
          </div>

          <div class="col">
            <label for="file" class="form-label">PDF file</label>
            <input type="file" name="file" accept="application/pdf" class="myfile">
            @if ($errors->has('file'))
                <small class="text-danger">*{{ $errors->first('file') }}</small>
            @endif
          </div>
        </div>

        <div class="clearfix">
          <div class="col">
            <label for="author" class="form-label">Author</label>
            <select name="author_id" class="author">
                <option value="">Choose Author</option>
                @foreach ($authors as $key => $value)
                    <option {{ old('author_id') == $key ? 'selected' : '' }} value="{{ $key }}">
                        {{ $value }}</option>
                @endforeach
            </select>
            @if ($errors->has('author_id'))
                <small class="text-danger">*{{ $errors->first('author_id') }}</small>
            @endif
          </div>

          <div class="col">
            <label for="category" class="form-label">Category</label>
            <select name="category_id" class="category">
              <option value="">Choose Category</option>
              @foreach ($categories as $key => $value)
                  <option {{ old('category_id') == $key ? 'selected' : '' }} value="{{ $key }}">
                      {{ $value }}</option>
              @endforeach
            </select>
            @if ($errors->has('category_id'))
                <small class="text-danger">*{{ $errors->first('category_id') }}</small>
            @endif
          </div>
        </div>

        <div class="clearfix">
            <div class="description">
                <label class="form-label">Book Description</label>
                <textarea name="description" class="description book-des" placeholder="Description" cols="30"
                    rows="5">{{ old('description') }}</textarea>
                @if ($errors->has('description'))
                    <small class="text-danger">*{{ $errors->first('description') }}</small>
                @endif
            </div>
        </div>

        <input type="submit" value="Create" class="create-btn ft-right me-3">
        <input type="button" value="Cancel" class="back-btn ft-right me-3"
            onclick="window.location='{{ URL::to('books') }}'" />
      </form>
    </div>
@endsection

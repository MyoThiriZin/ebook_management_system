@extends('layouts.master')

@section('content')
  <div class="form-sec">
    <div class="form-sec">
        @if (session('success_msg'))
    <div class="alert alert-success fade show col-md-4 mx-auto" role="alert">
      {{ session('success_msg') }}
      <a href="{{route('books.index')}}" class="ft-right pb-2"><button class="btn-primary btn-sm">OK</button></a>
    </div>
    @endif
    <h2 class="form-title">Edit Book</h2>
    <form action="{{ route('books.update', $item->id) }}" method="POST" enctype="multipart/form-data" class="form">
      @csrf
      @method("PUT")
      {{-- <div class="mb-3">
          <img src="{{asset('uploads/'.$item->image)}}" alt="" class="img-thumbnail" width="100px">
      </div> --}}
      <div class="clearfix">
        <div class="col">
          <label for="" class="form-label">Name</label>
          <input type="text" name="name" class="name" placeholder="Name" value="{{old('name', $item->name) }}">
          @if ($errors->has('name'))
              <small class="text-danger">*{{ $errors->first('name') }}</small>
          @endif
        </div>

        <div class="col">
          <label for="" class="form-label">Duration</label>
          <input type="number" name="duration" class="duration" placeholder="Duration"
          value="{{old('duration', $item->duration) }}">
          @if ($errors->has('duration'))
              <small class="text-danger">*{{ $errors->first('duration') }}</small>
          @endif
        </div>
      </div>

      <div class="clearfix">
        <div class="col">
          <label for="" class="form-label">Book Image</label>
          <input type="file" name="image" class="myfile" placeholder="Book Image"
              value="{{ $item->image }}">
        </div>

        <div class="col">
          <label for="" class="form-label">PDF file</label>

          <input type="file" name="file" class="myfile" value="{{ $item->file }}">
        </div>
      </div>

      <div class="clearfix">
        <div class="col">
            <label for="" class="form-label">Author</label>
            <select name="author_id" class="author">
                <option value="">Choose Author</option>
                @foreach ($authors as $key => $value)
                    @if ($item->author_id == $key)
                        <option value="{{ $key }}" selected>
                            {{ $value }}
                        </option>
                    @else
                        <option value="{{ $key }}">
                            {{ $value }}
                        </option>
                    @endif
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
                  @if ($item->category_id == $key)
                      <option value="{{ $key }}" selected>
                          {{ $value }}
                      </option>
                  @else
                      <option value="{{ $key }}">
                          {{ $value }}
                      </option>
                  @endif
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
          <textarea name="description" class="description" placeholder="Description" cols="30"
              rows="5">{{old('description', $item->description) }}</textarea>
          @if ($errors->has('description'))
              <small class="text-danger">*{{ $errors->first('description') }}</small>
          @endif
        </div>
      </div>

      <input type="submit" value="Update" class="create-btn">
      <input type="button" value="Cancel" class="back-btn" onclick="window.location='{{ URL::to('books') }}'"/>
    </form>
  </div>
@endsection

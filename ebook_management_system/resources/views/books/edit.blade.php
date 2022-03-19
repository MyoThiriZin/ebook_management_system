@extends('layouts.master')

@section('content')
    <div class="form-sec">
        <h2 class="form-title" style="text-align: center">Edit Book</h2>
        <form action="{{ route('books.update', $item->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            {{-- <div class="mb-3">
                <img src="{{asset('uploads/'.$item->image)}}" alt="" class="img-thumbnail" width="100px">
            </div> --}}
            <div class="first-column ft-left">
                <div class="input-group">
                    <label for="">Name</label>
                    <input type="text" name="name" class="name" placeholder="Name" value="{{ $item->name }}">
                    @if ($errors->has('name'))
                        <small class="text-danger">*{{ $errors->first('name') }}</small>
                    @endif
                </div>
                <div class="input-group">
                    <label for="">Book Image</label>
                    <input type="file" name="image" class="myfile" placeholder="Book Image"
                        value="{{ $item->image }}">
                </div>
                <div class="input-group">
                    <label for="">PDF file</label>
                    <input type="file" name="file" class="myfile" value="{{ $item->file }}">
                </div>
                <div class="input-group">
                    <label for="">Author</label>
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
                <div class=" clearfix">
                    <a href="{{route("books.index")}}"><button class="back-btn ft-left"><i class="fa-fw fas fa-backward"></i>Back</button></a>
                </div>
            </div>
            <div class="second-column ft-right">
                <div class="input-group">
                    <label for="">Category</label>
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
                <div class="input-group">
                    <label for="">Duration</label>
                    <input type="text" name="duration" class="duration" placeholder="Duration"
                        value="{{ $item->duration }}">
                    @if ($errors->has('duration'))
                        <small class="text-danger">*{{ $errors->first('duration') }}</small>
                    @endif
                </div>
                <div class="input-group">
                    <span>Book Description</span>
                    <textarea name="description" class="description" placeholder="Description" cols="30"
                        rows="6">{{ $item->description }}</textarea>
                    @if ($errors->has('description'))
                        <small class="text-danger">*{{ $errors->first('description') }}</small>
                    @endif
                </div>
                <input type="submit" value="Update" class="create-btn ft-right">
        </form>
    </div>
@endsection

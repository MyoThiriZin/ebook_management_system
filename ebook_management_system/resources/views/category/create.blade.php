@extends('layouts.master')
@section('content')
<div class="form-sec">
    <h2 class="form-title">Create Category</h2>
    <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data" class="clearfix form">
      @csrf
        <div class="clearfix">
            <div class="col">
                <label for="" class="form-label">Category Name</label>
                <input type="text" name="name" class="name" placeholder="Name">
                @if ($errors->has('name'))
                <small class="text-danger">*{{ $errors->first('name') }}</small>
                @endif
            </div>
        </div>
        <input type="submit" value="Create" class="create-btn">
    </form>
</div>
@endsection



 
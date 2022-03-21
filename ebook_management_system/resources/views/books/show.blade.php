@extends('layouts.master')
@section('content')
<div class="seemore">
<div class=" clearfix">
    <a href="{{route("books.index")}}"><button class="back-btn ft-left"><i class="fa-fw fas fa-backward"></i>Back</button></a>
</div>
    <div class="seemore-container">
        <h2 class="seemore-ttl">Book Information</h2>
        <div class="img-container">
            <img src="{{ asset('uploads/' . $item->image) }}" alt="book image" width="150px">
        </div>
        <div class="seemore-item">
            <label for="">ID :</label><span>{{ $item->id }}</span>
        </div>
        <div class="seemore-item">
            <label for="" class="">Name :</label><span>{{ $item->name }}</span>
        </div>
        <div class="seemore-item">
            <label for="">PDF File Name :</label><span>{{ $item->file }}</span>
        </div>
        <div class="seemore-item">
            <label for="">Author Name :</label><span>{{ $item->author->name }}</span>
        </div>
        <div class="seemore-item">
            <label for="">Category Name :</label><span>{{ $item->category->name }}</span>
        </div>
        <div class="seemore-item">
            <label for="">Borrow Duration :</label><span>{{ $item->duration }} days</span>
        </div>
        <div class="seemore-item clearfix">
            <label for="" class="ft-left">Description :</label><span class="ft-left">{{ $item->description }}</span>
        </div>
    </div>
</div>
@endsection

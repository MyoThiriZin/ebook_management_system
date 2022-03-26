@extends('users.layouts.master')
@section('content')

<div class="clearfix">
<div class="container">
<p>Latest Book</p>
<p>Total:</p>
@foreach ($books as $book)

    <ul class="userbook">
      <li class="bookpost">
      <img src="{{ asset('uploads/' . $book->image) }}" alt="{{ $book->name }}" />
      <h5>{{ $book->name }}</h5>
      <p>
        {{ $book->author->name }}
      </p>            
      <div>              
        <a href="#">See more>></a>
      </div>
      </li>
    </ul>
@endforeach
<div class="userbook-right">
  <p>Categories</p>

</div>
</div>

@endsection
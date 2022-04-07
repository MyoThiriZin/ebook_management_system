<link rel="stylesheet" href="{{ asset('css/user/borrowdetail.css') }}">
@extends('users.layouts.master')
@section('content')
<div class="container">
  <div class="book-detail">
    <div class="clearfix">
      <div class="ft-left book-left">
        <img src="{{ asset('uploads/'. $book->image ) }}" alt="Book" class="borrow-book-img">
      </div>

      <div class="ft-right book-right bookdetail">
        <h2 class="borrow-book-ttl">{{ $book->name }}</h2>
        <div class="book-detail-row clearfix">
          <div class="book-detail-col">
            <span>Author :</span>
          </div>
          <div class="book-detail-col">
            <span>{{ $book->author->name }}</span>
          </div>
        </div>

        <div class="book-detail-row clearfix">
          <div class="book-detail-col">
            <span>Categories :</span>
          </div>
          <div class="book-detail-col">
            <span>{{ $book->category->name }}</span>
          </div>
        </div>

        <div class="book-detail-row clearfix">
          <div class="book-detail-col">
            <span>Duration :</span>
          </div>
          <div class="book-detail-col">
            <span> {{ $book->duration }} Days</span>
          </div>
        </div>

        <div class="book-detail-row">
          <a href="{{ Auth::check() ? url('borrow/store/' . $book->id ) : url('login/' . 'user') }}" class="read-btn" target="_blank"><i class="fa-solid fa-book-open"></i>borrow</a>
        </div>
      </div>
    </div>
    <div class="book-detail-row">
      <p>{{ $book->description }}</p>
    </div>
  </div>
</div>
@endsection
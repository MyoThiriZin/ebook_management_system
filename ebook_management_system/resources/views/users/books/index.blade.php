<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/user/book.css') }}" rel="stylesheet">
@extends('users.layouts.master')
@section('content')
<div class="container">
  <div class="clearfix book-ttl">
    <h4 class="book-latest">Latest Book</h4>
    <h4 class="book-total">Total: {{ $data->count() }} books</h4>
  </div>
  <div class="clearfix show-book">
    <ul class="userbook">
      @forelse ($items as $item)
      <li class="bookpost clearfix">
        <img src="/uploads/{{ $item->image }}">
        <h5>{{ $item->name }}</h5>
        <p>
          Author : {{ $item->author->name }}
        </p>
        <p>
          Category : {{ $item->category->name }}
        </p>
        <div>
          <a href="{{ url('book/detail/' . $item->id) }}">See more>></a>
        </div>
      </li>
      @empty
      <p>There is no book.</p>
      @endforelse
    </ul>

    <div class="userbook-right">
      <div class="book-search">
        <div class="book-search-ttl">
          Search
        </div>
        <form action="{{ route('user#booksearch') }}" method="get">
          @csrf
          <select name="author_id" id="">
            <option value="">Choose Author</option>
            @foreach ($authors as $key => $value)
            <option value="{{ $key }}" {{ (old('author_id', request()->query('author_id')) == $key  ? 'selected':'') }}>{{ $value }}</option>
            @endforeach
          </select>
          <select name="category_id" id="">
            <option value="">Choose Category</option>
            @foreach ($categories as $key => $value)
            <option value="{{ $key }}" {{ (old('category_id', request()->query('category_id')) == $key  ? 'selected':'') }}>{{ $value }}</option>
            @endforeach
          </select>
          <input type="text" name="searchData" placeholder="Search" value="{{ old('searchData', request()->query('searchData')) }}">
          <div class="search-button clearfix">
            <input type="submit" value="Search" class="search-button-link">
          </div>
        </form>
      </div>
    </div>

    <div class="ft-left cus-paginate">
      <div class="paginate">
        {{ $items->links() }}
      </div>
    </div>
  </div>

  <script src="{{ asset('js/user/jquery.heightLine.js') }}"></script>
  <script src="{{ asset('js/user/common.js') }}"></script>
  @endsection
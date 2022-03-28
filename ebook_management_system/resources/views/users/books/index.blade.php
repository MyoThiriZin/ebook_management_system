<link href="{{ asset('css/user/book.css') }}" rel="stylesheet">
@extends('users.layouts.master')
@section('content')
    <div class="container">
        <div class="clearfix book-ttl">
            <h4 class="book-latest">Latest Book</h4>
            <h4 class="book-total">Total: {{ $items->count() }} books</h4>
        </div>
        <div class="clearfix show-book">
            <ul class="userbook">
                @forelse ($items as $item)
                    <li class="bookpost clearfix">
                        <img src="/uploads/{{ $item->image }}">
                        <h5>{{ $item->name }}</h5>
                        <p>
                            {{ $item->author->name }}
                        </p>
                        <p>
                            {{ $item->category->name }}
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
                    <form action="{{ route('user#booksearch') }}" method="POST">
                        @csrf
                        <select name="author_id" id="">
                            <option value="">Choose Author</option>
                            @foreach ($authors as $key => $value)
                                <option value="{{ $key }}">{{ $value }}
                                </option>
                            @endforeach
                        </select>
                        <select name="category_id" id="">
                            <option value="">Choose Category</option>
                            @foreach ($categories as $key => $value)
                                <option value="{{ $key }}">{{ $value }}
                                </option>
                            @endforeach
                        </select>
                        <input type="text" name="searchData" placeholder="Search">
                        <div class="search-button clearfix">
                            <input type="submit" value="Search" class="search-button-link">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection

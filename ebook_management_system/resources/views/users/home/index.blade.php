@extends('users.layouts.master')

@section('content')

<div class="container home-sec">
    <section class="top-slider slider">
      <div>
        <img src="/img/slider1.jpg">
      </div>
      <div>
        <img src="/img/slider2.jpg">
      </div>
      <div>
        <img src="/img/slider3.jpg">
      </div>
    </section>

  <div class="popular-ebooks-sec">
    <h3 class="popular-title">Popular Ebooks</h3>
    <section class="popular-ebook-slider slider">
    @foreach ($books as $book)
      <div>
        <img src="/uploads/{{ $book->image }}" alt="tag">
        <span class="book-name">{{ $book->name }}</span>
        <a href="#" class="book-seemore">See More >></a>
      </div>
    @endforeach
    </section>
  </div>

  <div class="top-authors-sec">
    <h3 class="popular-title">Top Authors</h3>
    <ul>
    @foreach ($authornames as $authorname)
      <li>
        <i class="fa fa-user-circle fa-3x" aria-hidden="true"></i>
        <span class="author-name">{{ $authorname }}</span>
      </li>
    @endforeach
    </ul>
  </div>

  <div class="popular-category-sec">
    <h3 class="popular-title">Popular Categories</h3>
    <ul>
    @foreach ($categorynames as $categoryname)
      <li>
        <i class="fa fa-book fa-3x" aria-hidden="true"></i>
        <span class="category-name">{{ $categoryname }}</span>
      </li>
    @endforeach
    </ul>
  </div>
</div>

@endsection

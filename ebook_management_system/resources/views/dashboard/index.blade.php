@extends('layouts.master')

@section('content')

<div class="count-sec">
  <div class="row count-sec">
    <div class="col">
      <div class="card">
        <div class="card-body book-count">
          <h5 class="card-title count-title">Total Books</h5>
          <p class="card-text count-number"><i class="fa fa-book" aria-hidden="true"></i> {{count($books)}}</p>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card">
        <div class="card-body author-count">
          <h5 class="card-title count-title">Total Authors</h5>
          <p class="card-text count-number"><i class="fa fa-user" aria-hidden="true"></i> {{count($authors)}}</p>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card">
        <div class="card-body category-count">
          <h5 class="card-title count-title">Total Categories</h5>
          <p class="card-text count-number"><i class="fa fa-book" aria-hidden="true"></i> {{count($categories)}}</p>
        </div>
      </div>
    </div>
  </div>
</div>

<h2 class="dashboard-title">Book Popularity</h2>

<div class="chart-sec">
  {!! $chart->container() !!}
  
  {!! $chart->script() !!}
</div>
    
@endsection
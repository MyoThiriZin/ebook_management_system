@extends('users.layouts.master')

@section('content')
    <!--<h2 class="form-title">Borrow List</h2>-->
    <link href="{{ asset('css/user/userborrowlist.css') }}" rel="stylesheet">
    <div class="wrapper">
            <div class="container-borrowlist-suan">
                <div class="clearfix">
                    <div class="ul-borrowbook-suan">
                        <ul>
                            @forelse ($items as $item)
                                <li class="li-booklist-suan">
                                    <img src="/uploads/{{$item->book->image}}" class="img-borrowli-suan"
                                        alt="Book cover photo">
                                    <h3 class="head-borrowli-suan">{{$item->book->name}}</h3><br>
                                    <div class="lbl-borrowgp-suan">
                                        <label>Author : &nbsp;&nbsp;&nbsp;{{ $item->book->author->name }} </label><br>
                                        <label>Category : &nbsp;&nbsp;&nbsp;{{$item->book->category->name}}</label><br>
                                        <label>Duration : &nbsp;&nbsp;&nbsp;{{$item->book->duration}}</label><br>
                                    </div>
                                    <a href="{{ Auth::check() ? url('borrow/store/' . $item->book->id ) : url('/user/login') }}" target="_blank"><button class="btn-read-suan"><i class="fa-solid fa-book-open"></i>&nbsp;Read</button></a>
                                </li>
                            @empty
                                <p>There is no borrow book</p>
                            @endforelse

                        </ul>
                    </div>
                </div>
            </div>
            <div>
            </div>
    </div>
@endsection

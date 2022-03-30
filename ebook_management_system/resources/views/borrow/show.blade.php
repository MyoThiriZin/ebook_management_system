@extends('layouts.master')

@section('content')
    <div class="seemore">
        <div class=" clearfix">
            <a href="{{ route('borrows.index') }}"><button class="back-btn ft-left"><i
                        class="fa-fw fas fa-backward"></i>Back</button></a>
        </div>
        <div class="seemore-container">
            <h2 class="seemore-ttl">Borrow Information</h2>
            <div class="seemore-item">
                <label for="">ID :</label><span>{{ $item->id }}</span>
            </div>
            <div class="seemore-item">
                <label for="" class="">User Name :</label><span>{{ $item->user->name }}</span>
            </div>
            <div class="seemore-item">
                <label for="" class="">Book Name :</label><span>{{ $item->book->name }}</span>
            </div>
            <div class="seemore-item">
                <label for="" class="">Start Date :</label><span>{{ $item->start_date }}</span>
            </div>
            <div class="seemore-item">
                <label for="" class="">End Date :</label><span>{{ $item->end_date }}</span>
            </div>
        </div>
    </div>
@endsection

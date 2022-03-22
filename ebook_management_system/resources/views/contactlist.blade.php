@extends('layouts.master')

@section('content')

<h2 class="form-title">Contact List</h2>

<div class="form-sec">
  <form action="{route{'contactlist'}}" method="GET" enctype="multipart/form-data">
        @csrf
        <input type="text" name="searchData" placeholder="Search" class="search-input"
            value="">
        <input type="submit" class="search-btn" value="Search">
    </form>
      <table class="tbl-authlist-suan">
        <tr>
<td>No.</td>
<td>Name</td>
<td>Email</td></td>
<td>Message</td>
<td>Phone No</td>
        </tr>
        @foreach ($contactinfo as $contactshow)
<tr>
<td>{{ $contactinfo->id }}</td>
<td>{{ $contactshow->name }}</td>
<td>{{ $contactshow->email }}</td>
<td >
            <a href=""><button class="seemore-btn"><i class="fa-solid fa-eye"></i></button></a>
            <button class="delete-btn" data-bs-toggle="modal"
            data-bs-target=""><i class="fa-solid fa-trash-can"></i></button>
</td>
</tr>
@endforeach
      </table>

</div>

@endsection
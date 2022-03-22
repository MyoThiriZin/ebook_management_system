@extends('layouts.master')

@section('content')

<h2 class="form-title">Borrow List</h2>
<form action="" method="GET" enctype="multipart/form-data">
        @csrf
        <input type="text" name="searchData" placeholder="Search" class="search-input"
            value="">
        <input type="submit" class="search-btn" value="Search">
    </form>
<div class="form-sec">

      <table class="tbl-authlist-suan">
        <tr>
<td>No.</td>
<td>User ID</td>
<td>Book ID</td></td>
<td>Start Date</td>
<td>End Date</td>
<td>Action</td>
        </tr>

        <tr>
        <td>No.</td>
<td>User ID</td>
<td>Book ID</td></td>
<td>Start Date</td>
<td>End Date</td>
<td >
            <a href=""><button class="seemore-btn"><i class="fa-solid fa-eye"></i></button></a>
            <button class="delete-btn" data-bs-toggle="modal"
            data-bs-target=""><i class="fa-solid fa-trash-can"></i></button>
</td>
        </tr>
      </table>
  </form>
</div>

@endsection
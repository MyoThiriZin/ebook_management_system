@extends('layouts.master')

@section('content')

<h2 class="form-title">Author List</h2>

<div class="form-sec">
  <form action="" method="POST" class="form-control">
  <input type="text" placeholder="Search the author name" name="authornamesearch">
      <button type="submit"><i class="fa fa-search"></i></button>
      <table class="tbl-authlist-suan">
        <tr>
<td>No.</td>
<td>Author Name</td>
<td>Description</td>
<td>Status</td>
        </tr>
        @foreach ($authorinfo as $authorshow)
<tr>
<td>{{ $author->id }}</td>
<td>{{ $authorshow->name }}</td>
<td>{{ $authorshow->description }}</td>
</tr>
@endforeach
      </table>
  </form>
</div>

@endsection
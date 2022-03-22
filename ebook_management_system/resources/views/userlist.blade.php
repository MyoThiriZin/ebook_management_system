@extends('layouts.master')

@section('content')

<h2 class="form-title">User List</h2>

<div class="form-sec">
  <form action="" method="POST" class="form-control">
  <input type="text" placeholder="Search the author name" name="usernamesearch">
      <button type="submit"><i class="fa fa-search"></i></button>
      <table class="tbl-authlist-suan">
        <tr>
<td>No.</td>
<td>User Photo</td>
<td>Name</td>
<td>Email</td>
<td>Address</td>
<td>Type</td>
<td>Action</td>
        </tr>
        @foreach ($usershow as $userinfo)
<tr>
<td>{{ $usershow->id }}</td>
<td>{{ $usershow->name }}</td>
<td>{{ $usershow->email }}</td>
<td>{{ $usershow->password }}</td>
<td>{{ $usershow->phone_no }}</td>
<td>{{ $usershow->address }}</td>
<td>{{ $usershow->description }}</td>
<td><a href = 'delete/{{ $usershow->id }}'>Delete</a></td>
<td><a href = 'details/{{ $usershow->id }}'>Delete</a></td>
</tr>
@endforeach
      </table>
  </form>
</div>

@endsection
@extends('layouts.master')

@section('content')

<h2 class="form-title">Create Book</h2>

<div class="form-sec">
  <form action="#">
    <input type="text" name="name" class="name" placeholder="Name">
    <select name="author" class="author">
      <option value="">Author</option>
    </select>
    <select name="category" class="category">
      <option value="">Category</option>
    </select>
    <input type="file" name="myfile" class="myfile" >
    <input type="text" name="duration" class="duration" placeholder="Duration">
    <textarea name="description" class="description" placeholder="Description" cols="30" rows="10"></textarea>
    <input type="submit" value="Create" class="create-btn ft-right">
  </form>
</div>


@endsection
@extends('layouts.master')

@section('content')

<div class="add-btn clearfix">
  <div class="ft-right search-form">
    <form action="{{ route('contact.index') }}" method="GET" enctype="multipart/form-data">
      @csrf
      <input type="text" name="searchData" placeholder="Search" class="search-input" value="{{ old('searchData', request()->query('searchData')) }}">
      <input type="submit" class="search-btn" value="Search">
    </form>
  </div>
</div>

@if (session('success_msg'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ session('success_msg') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<table cellspacing="0" cellpadding="0">
  <thead class="heading">
    <tr>
      <th>No</th>
      <th>Name</th>
      <th>Email</th>
      <th class="pc">Phone No</th>
      <th class="pc">Message</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($contactinfo as $contactshow)
    <tr>
      <td>{{ ($contactinfo->currentPage()-1) * $contactinfo->perPage() + $loop->index + 1 }}</td>
      <td>{{ $contactshow->name }}</td>
      <td>{{ $contactshow->email }}</td>
      <td class="pc">{{ $contactshow->phone_no }}</td>
      <td class="pc">{{ $contactshow->message }}</td>
      <td>
        <a href="{{ route('contact.show', $contactshow->id) }}" class="sp"><button class="seemore-btn"><i class="fa-solid fa-eye"></i></button></a>
        <button class="delete-btn" data-bs-toggle="modal" data-bs-target="#modal{{ $contactshow->id }}"><i class="fa-solid fa-trash-can"></i></button>
      </td>

      {{-- Delete Modal --}}
      <div class="modal fade" id="modal{{ $contactshow->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content ">
            <div class="modal-header text-center">
              <h3 class="modal-title " id="exampleModalLabel">Confirm Delete</h3>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <h4>Are you sure to delete this record?</h4>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary btn-sm me-3" data-bs-dismiss="modal">No</button>
              <form action="{{ route('contact.destroy' , $contactshow->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Yes</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </tr>
    @empty
    <tr>
      <td colspan="6" style="text-align: center">There is no feedback data.</td>
    </tr>
    @endforelse
</table>

@endsection
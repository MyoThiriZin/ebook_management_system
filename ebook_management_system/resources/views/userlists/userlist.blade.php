@extends('layouts.master')

@section('content')

<div class="add-btn clearfix">
  <div class="ft-right search-form">
    <form action="{{ route('users.index') }}" method="GET" enctype="multipart/form-data">
        @csrf
        <input type="text" name="searchData" placeholder="Search" class="search-input"
            value="{{ old('searchData', request()->query('searchData')) }}">
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
        <th class="pc">Address</th>
        <th class="pc">Phone</th>
        <th class="pc">Role</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $userinfo)
      <tr>
        <td>{{ ($users->currentPage()-1) * $users->perPage() + $loop->index + 1 }}</td>
        <td>{{ $userinfo->name }}</td>
        <td>{{ $userinfo->email }}</td>
        <td class="pc">{{ $userinfo->address }}</td>
        <td class="pc">{{ $userinfo->phone_no }}</td>
        @if($userinfo->type == 0)
          <td class="pc">Admin</td>
          @else
          <td class="pc">User</td>
        @endif
        <td>
          <a href="{{ route('users.show', $userinfo->id) }}" class="sp"><button class="seemore-btn"><i class="fa-solid fa-eye"></i></button></a>
          @if($userinfo->id == Auth::user()->id)
            <button class="delete-btn" data-bs-toggle="modal" data-bs-target="#modal{{ $userinfo->id }}" style="display:none;"><i class="fa-solid fa-trash-can"></i></button>
          @else
            <button class="delete-btn" data-bs-toggle="modal" data-bs-target="#modal{{ $userinfo->id }}"><i class="fa-solid fa-trash-can"></i></button>
          @endif
          @csrf
        </td>
        <div class="modal fade" id="modal{{ $userinfo->id }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h3 class="modal-title " id="exampleModalLabel">Confirm Delete</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h4>Are you sure to delete this record?</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm me-3" data-bs-dismiss="modal">No</button>
                        <form action="{{ route('users.destroy', $userinfo->id ) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Yes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
      </tr>
      @endforeach
    </tbody>
  </table>
<div class="paginate">
    {{$users->links()}}
</div>
@endsection
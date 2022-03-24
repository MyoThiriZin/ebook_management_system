@extends('layouts.master')

@section('content')

<div class="add-btn clearfix">
  <a href="{{route('authors.create')}}" class="ft-right"><button class="add-btn-link"><i class="fa-fw fas fa-plus"></i> Add Author</button></a>
</div>

<div class="clearfix">
  <form action="/search" method="get" class="search-form ft-right">
    <input type="search" name="search" class="form-control">
    <button type="submit" class="btn">Search</button>
  </form>
</div>

<div>
  @if(request()->has('view_deleted'))

    <a href="{{ route('authors.index') }}" class="btn btn-info btn-sm">View All Author</a>

  @else

    <a href="{{ route('authors.index', ['view_deleted' => 'DeletedRecords']) }}" class="btn btn-primary">View Deleted Post</a>

  @endif
</div>

@if (session('success_msg'))
  <div class="alert alert-success fade show col-md-4 mx-auto" role="alert">
    {{ session('success_msg') }}
    <a href="{{route('authors.index')}}" class="ft-right pb-2"><button class="btn-primary btn-sm">OK</button></a>
  </div>
@endif

<table cellspacing="0" cellpadding="0">
    <thead class="heading">
      <tr>
          <th><span>ID</span></th>
          <th><span>Name</span></th>
          <th><span>Email</span></th>
          <th class="description-sec"><span>Description</span></th>
          <th><span>Action</span></th>

      </tr>
    </thead>
    <tbody>
    @forelse ($authors as $author)
        <tr>
        <td>{{$author->id}}</td>
        <td>{{$author->name}}</td>
        <td>{{$author->email}}</td>
        <td>{{$author->description}}</td>
        <td class="action">
          @if(request()->has('view_deleted'))

            <a href="{{ route('authors.restore', $author->id) }}" class="btn btn-primary btn-sm">Restore</a>

          @else

            <a href="/authors/{{ $author->id }}/edit"><button class="edit-btn"><i class="fas fa-edit"></i></button></a>
            <a href="/authors/{{ $author->id }}"><button class="seemore-btn"><i class="fa-solid fa-eye"></i></button></a>
            <button class="delete-btn" data-bs-toggle="modal"
            data-bs-target="#modal{{ $author->id }}"><i class="fa-solid fa-trash-can"></i></button>

          @endif
        </td>
        <div class="modal fade" id="modal{{ $author->id }}" class="confirm-delete-modal" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content ">
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
                        <button type="submit" class="btn btn-danger btn-sm" onclick="deleteAuthor({{ $author->id }})">Yes</button>
                    </div>
                </div>
            </div>
        </div>
      </tr>
    @empty
    <tr>
      <td colspan="6" style="text-align: center">There is no author data.</td>
    </tr>
    @endforelse

  </tbody>
</table>

{{ $authors->links() }}

<script src="/js//library/jquery-3.6.0.min.js"></script>
<script src="/js/authors.js"></script>
@endsection
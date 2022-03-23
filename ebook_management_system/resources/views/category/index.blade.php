@extends('layouts.master')
@section('content')

<div class="add-btn clearfix">
  <a href="{{ route('category.create') }}" class="ft-right"><button class="add-btn-link"><i class="fa-fw fas fa-plus"></i> Add Category</button></a>
  
  <div class="ft-left clearfix csv-search">
    <div class="csv-btn ft-left">
        <a href="{{ url('category/export') }}"><button class="csv-btn-link"> Export CSV</button></a>
    </div>
    <div class="csv-btn ft-left">
        <a href="{{ url('category/importFile') }}"><button class="csv-btn-link"> Import CSV</button></a>
    </div>
    <div class="ft-right search-form">
      <form action="{{ route('category.search') }}" method="GET" enctype="multipart/form-data">
        @csrf
        <input type="text" name="search" placeholder="Search" class="search-input" required/>
        <button type="submit" class="search-btn">Search</button>
      </form>
    </div>
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
         <th><span>No</span></th>
         <th><span>Category Name</span></th>
         <th><span>Action</span></th>
       </tr>
     </thead>
     <tbody>
     @forelse ($categories as $category)
        <tr>
            <td>{{ ($categories->currentPage()-1) * $categories->perPage() + $loop->index + 1 }}</td>
            <td>{{ $category->name }}</td>
            <td class="action">
            <a href="{{ route('category.edit', $category) }}"><button class="edit-btn"><i class="fas fa-edit"></i></button></a>
            <button class="delete-btn" data-bs-toggle="modal" data-bs-target="#modal{{ $category->id }}"><i class="fa-solid fa-trash-can"></i></button>
                @csrf
            </td>
            <div class="modal fade" id="modal{{ $category->id }}" tabindex="-1"
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
                        <form action="{{ route('category.destroy', $category) }}" method="POST">
                            @csrf
                            @method('post')
                            <button type="submit" class="btn btn-danger btn-sm">Yes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </tr>
    @empty
    <tr>
        <td colspan="6" style="text-align: center">There is no category.</td>
    </tr>
     @endforelse
    </tbody>
</table>

<div class="paginate">
    {{$categories->links()}}
</div>
@endsection

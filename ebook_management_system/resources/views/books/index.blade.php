@extends('layouts.master')

@section('content')
    <div class="add-btn clearfix">
        <a href="{{ route('books.create') }}"><button class="add-btn-link ft-right"><i class="fa-fw fas fa-plus"></i> Add
                Book</button></a>
        <div class="ft-right search-form">
            <form action="{{ route('books.index') }}" method="GET" enctype="multipart/form-data">
                @csrf
                <input type="text" name="searchData" placeholder="Search"
                    value="{{ old('searchData', request()->query('searchData')) }}">
                <input type="submit" class="search-btn" value="Search">
            </form>
        </div>
        <div class="mb-3 ms-3 me-5  float-start">
            <a href="{{ url('/export/') }}" class="btn btn-success"></i>Export CSV</a>
        </div>

        <div class="mb-3 me-5  float-start">
            <a href="{{ url('/importFile') }}" class="btn btn-success"></i>Import CSV</a>
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
                <th><span>ID</span></th>
                {{-- <th><span>Image</span></th> --}}
                <th><span>Name</span></th>
                <th><span>Author Name</span></th>
                <th><span>Category Name</span></th>
                <th><span>Borrow Duration</span></th>
                <th><span>Action</span></th>

            </tr>
        </thead>
        <tbody>
            @forelse ($items as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    {{-- <td><img src="/uploads/{{ $item->image }}" width="100px" height="50px"></td> --}}
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->author->name }}</td>
                    <td>{{ $item->category->name }}</td>
                    <td>{{ $item->duration }} days</td>
                    <td class="action">
                        <a href="{{ url('/books/' . $item->id . '/edit') }}"><button
                                class="edit-btn">Edit</button></a>
                        <a href="{{ url('/books/' . $item->id) }}"><button class="seemore-btn">Seemore</button></a>
                        <button class="delete-btn" data-bs-toggle="modal"
                            data-bs-target="#modal{{ $item->id }}">Delete</button>
                    </td>
                    <div class="modal fade" id="modal{{ $item->id }}" tabindex="-1"
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
                                    <button type="button" class="btn btn-secondary btn-sm me-3"
                                        data-bs-dismiss="modal">No</button>
                                    <form action="{{ url('/books/' . $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Yes</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <td>
             <embed type="application/pdf" src="/pdf_files/{{ $item->file }}" width="200" height="200">
            </td> --}}
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center">There is no book data.</td>
                </tr>
            @endforelse

        </tbody>
    </table>
@endsection

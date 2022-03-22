@extends('layouts.master')

@section('content')
    <div class="add-btn clearfix">
        <div class="csv-btn ">
            <a href="{{ url('author/export') }}" class="ft-left"><button class="csv-btn-link"> Export
                    CSV</button></a>
        </div>
        <div class="csv-btn ">
            <a href="{{ url('author/importFile') }}" class="ft-left"><button class="csv-btn-link"> Import
                    CSV</button></a>
        </div>

        <a href="{{ route('authors.create') }}" class="ft-right"><button class="add-btn-link"><i
                    class="fa-fw fas fa-plus"></i> Add Author</button></a>
        <div class="ft-right search-form">
            <form action="/author/search" method="get">
                <input type="search" name="search" placeholder="Search" class="search-input">
                <button type="submit" class="search-btn">Search</button>
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
                <th><span>ID</span></th>
                <th><span>Name</span></th>
                <th><span>Description</span></th>
                <th><span>Action</span></th>

            </tr>
        </thead>
        <tbody>
            @forelse ($authors as $author)
                <tr>
                    <td>{{ $author->id }}</td>
                    <td>{{ $author->name }}</td>
                    <td>{{ $author->description }}</td>
                    <td class="action">
                        <a href="/authors/{{ $author->id }}/edit"><button class="edit-btn"><i
                                    class="fas fa-edit"></i></button></a>
                        <a href="/authors/{{ $author->id }}"><button class="seemore-btn"><i
                                    class="fa-solid fa-eye"></i></button></a>
                        <button class="delete-btn" data-bs-toggle="modal" data-bs-target="#modal{{ $author->id }}"><i
                                class="fa-solid fa-trash-can"></i></button>
                    </td>
                    <div class="modal fade" id="modal{{ $author->id }}" tabindex="-1"
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
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="deleteAuthor({{ $author->id }})">Yes</button>
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

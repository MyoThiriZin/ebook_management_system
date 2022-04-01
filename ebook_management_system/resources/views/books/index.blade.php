@extends('layouts.master')
@section('content')
  <div class="add-btn clearfix book-form">
    <a href="{{ route('books.create') }}" class="ft-right"><button class="add-btn-link"><i
                class="fa-fw fas fa-plus"></i> Add Book</button></a>
    <div class="ft-right search-form">
      <form action="{{ route('books.index') }}" method="GET" enctype="multipart/form-data">
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
        <th><span>No</span></th>
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
          <td>{{ ($items->currentPage() - 1) * $items->perPage() + $loop->index + 1 }}</td>
          <td>{{ $item->name }}</td>
          <td>{{ $item->author->name }}</td>
          <td>{{ $item->category->name }}</td>
          <td>{{ $item->duration }} days</td>
          <td class="action">
            <a href="{{ url('/books/' . $item->id . '/edit') }}"><button class="edit-btn"><i
                        class="fas fa-edit"></i></button></a>
            <a href="{{ route('books.show', $item->id) }}"><button class="seemore-btn"><i
                        class="fa-solid fa-eye"></i></button></a>
            <button class="delete-btn" data-bs-toggle="modal" data-bs-target="#modal{{ $item->id }}"><i
                    class="fa-solid fa-trash-can"></i></button>
          </td>

          {{-- Delete Modal --}}
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
        </tr>
      @empty
        <tr>
          <td colspan="6" style="text-align: center">There is no book data.</td>
        </tr>
      @endforelse

    </tbody>
  </table>

  <div class="paginate">
    {{ $items->links() }}
  </div>
@endsection

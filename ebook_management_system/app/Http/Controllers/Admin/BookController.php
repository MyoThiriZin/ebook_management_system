<?php

namespace App\Http\Controllers\Admin;

use App\Book;
use App\Contracts\Services\BookServiceInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * This is Book Controller.
 * This will handle book CRUD processing.
 */
class BookController extends Controller
{
    /**
     * book service
     */
    private $bookService;

    /**
     * Create a new controller instance.
     * @param BookServiceInterface $bookService
     * @return void
     */
    public function __construct(BookServiceInterface $bookService)
    {
        $this->bookService = $bookService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = $this->bookService->index();

        return view('books.index', ['items' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = $this->bookService->getAuthor();

        $categories = $this->bookService->getCategory();

        return view('books.create')->with(['authors' => $authors, 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:books,name,except,id',
            'image' => 'required',
            'file' => 'required',
            'duration' => 'required',
            'description' => 'required',
            'author_id' => 'required',
            'category_id' => 'required',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $this->bookService->store($request);

        return redirect()->back()->with("success_msg", createdMessage("Book"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('books.show')->with(['item' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $authors = $this->bookService->getAuthor();

        $categories = $this->bookService->getCategory();

        return view('books.edit')->with(['item' => $book, 'authors' => $authors, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'duration' => 'required',
            'description' => 'required',
            'author_id' => 'required',
            'category_id' => 'required',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $this->bookService->update($request, $book);

        return redirect()->back()->with("success_msg", updatedMessage("Book"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $this->bookService->delete($book);

        return redirect()->back()->with("success_msg", deletedMessage("Book"));
    }
}

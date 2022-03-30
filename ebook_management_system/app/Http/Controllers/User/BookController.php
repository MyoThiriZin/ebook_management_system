<?php

namespace App\Http\Controllers\User;

use App\Book;
use App\Contracts\Services\User\BookServiceInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Book Interface
     */
    private $bookInterface;

    /**
     * Create a new controller instance.
     * @param BookServiceInterface $bookServiceInterface
     * @return void
     */
    public function __construct(BookServiceInterface $bookServiceInterface)
    {
        $this->bookInterface = $bookServiceInterface;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getBookByID($id)
    {
        $book = $this->bookInterface->getBook($id);

        return view('users.books.detail')->with(['book' => $book]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = $this->bookInterface->index();

        $authors = $this->bookInterface->getAuthor();
        $categories = $this->bookInterface->getCategory();

        return view('users.books.index', ['items' => $books, 'categories' => $categories, 'authors' => $authors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function storeBorrowBook($id)
    {
        $book = $this->bookInterface->storeBook($id);

        return view('users.books.pdf')->with(['book' => $book]);
    }

    public function search(Request $request)
    {
        $authors = $this->bookInterface->getAuthor();
        $categories = $this->bookInterface->getCategory();
        $books = $this->bookInterface->search($request);

        return view('users.books.index')->with(['items' => $books, 'categories' => $categories, 'authors' => $authors]);

    }

}

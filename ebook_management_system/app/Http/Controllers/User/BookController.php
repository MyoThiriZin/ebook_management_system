<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\storeBookRequest;
use Illuminate\Http\Request;
use App\Contracts\Services\User\BookServiceInterface;
use App\Book;
use App\Borrow;
use App\Category;


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
        $books=Book::all();
        // latest book
        $book = $books->last();
        return view('users.books.index',compact('books', 'book'));

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeBookRequest $request)
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


}

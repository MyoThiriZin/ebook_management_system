<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contracts\Services\User\BookServiceInterface;
use App\Book;
use App\Borrow;

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

<?php

namespace App\Http\Controllers\User;

use App\Book;
use App\Author;
use App\Borrow;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\storeBookRequest;
use App\Contracts\Services\User\BookServiceInterface;


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
        $books = Book::with('author', 'category')->latest()->get();
        $authors = Author::orderBy("name")->get()->pluck("name", "id");
        $categories = Category::orderBy("name")->get()->pluck("name", "id");

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

    public function search(Request $request)
    {
        $author = $request->author_id;
        $category = $request->category_id;

        $search = $request->searchData;

        $authors = Author::orderBy("name")->get()->pluck("name", "id");
        $categories = Category::orderBy("name")->get()->pluck("name", "id");

        $books = Book::when($search, function ($query) use ($search) {
            $query->where('name', 'LIKE', '%' . $search . '%')
                ->orWhere('duration', 'LIKE', '%' . $search . '%')
                ->orWhere(function ($query) use ($search) {
                    $query->whereHas('author', function ($qry) use ($search) {
                        $qry->where('name', 'LIKE', '%' . $search . '%');
                    });
                })
                ->orWhere(function ($query) use ($search) {
                    $query->whereHas('category', function ($qry) use ($search) {
                        $qry->where('name', 'LIKE', '%' . $search . '%');
                    });
                });

        })->when($category, function ($query) use ($category) {
            $query->orwhereHas('category', function ($qry) use ($category) {
                $qry->where('id', $category);
            });
        })->when($author, function ($query) use ($author) {
            $query->orwhereHas('author', function ($qry) use ($author) {
                $qry->where('id',$author);
            });
        })->latest()->paginate(5);

        return view('users.books.index')->with(['items' => $books, 'categories' => $categories, 'authors' => $authors]);

    }

}

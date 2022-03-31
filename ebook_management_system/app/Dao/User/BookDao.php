<?php
namespace App\Dao\User;

use App\Author;
use App\Book;
use App\Borrow;
use App\Category;
use App\Contracts\Dao\User\BookDaoInterface;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class BookDao implements BookDaoInterface
{
    private $model;

    public function __construct(Book $model)
    {
        $this->model = $model;
    }

    /**
     * Get book by id
     *
     * @param $id
     * @return $book
     */
    public function getBook($id)
    {
        $book = $this->model->with('author', 'category')->find($id);
        return $book;
    }

    /**
     * To save borrow book
     *
     * @param array $book
     */
    public function storeBook($book)
    {
        $userid = Auth::user()->id ?? 1;
        $borrow = Borrow::where('user_id', $userid)
            ->where('book_id', $book->id)
            ->first();
        if ($borrow) {
            if ($borrow->end_date < Carbon::now()) {
                $borrow->start_date = Carbon::now();
                $borrow->end_date = Carbon::now()->addDays($book->duration);
                $borrow->mail_status = 'pending';
                $borrow->save();
            }
        } else {
            $borrow = new Borrow();
            $borrow->user_id = $userid;
            $borrow->book_id = $book->id;
            $borrow->start_date = Carbon::now();
            $borrow->end_date = Carbon::now()->addDays($book->duration);
            $borrow->mail_status = 'pending';
            $borrow->created_by = $userid;
            $borrow->updated_by = $userid;
            $borrow->save();
        }
        return $book;
    }

    public function search($request)
    {
        $author = $request->author_id;
        $category = $request->category_id;
        $search = $request->searchData;

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
                $qry->where('id', $author);
            });
        })->latest()->paginate(12);

        return $books;
    }

    public function index()
    {
        $books = Book::with('author', 'category')->latest()->paginate(8);

        return $books;
    }

    public function getAuthor()
    {
        return Author::orderBy("name")->get()->pluck("name", "id");
    }

    public function getCategory()
    {
        return Category::orderBy("name")->get()->pluck("name", "id");
    }

    public function get()
    {
        return $this->model->get();
    }

    public function searchTotal($request)
    {
        $author = $request->author_id;
        $category = $request->category_id;
        $search = $request->searchData;

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
                $qry->where('id', $author);
            });
        })->get();

        return $books;
    }
}

<?php
namespace App\Dao\User;

use App\Book;
use App\Borrow;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use App\Contracts\Dao\User\BookDaoInterface;
use Illuminate\Support\Facades\Storage;

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
        $book = $this->model->with('author','category')->find($id);
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
            if( $borrow->end_date < Carbon::now()) {
                $borrow->start_date = Carbon::now();
                $borrow->end_date = Carbon::now()->addDays($book->duration);
                $borrow->mail_status = 'pending';
                $borrow->save();
            }
        } else {
            $borrow = new Borrow();
            $borrow->user_id = $userid ;
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

    
}

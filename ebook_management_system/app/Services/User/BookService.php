<?php
namespace App\Services\User;

use Illuminate\Http\Request;
use App\Contracts\Dao\User\BookDaoInterface;
use App\Contracts\Services\User\BookServiceInterface;
use App\Book;

class BookService implements BookServiceInterface
{

    private $bookDao;

    public function __construct(BookDaoInterface $bookDao)
    {
        $this->bookDao = $bookDao;
    }

    /**
     * To get book by id.
     * 
     * @param $id
     * @return Object $book book Object
     */
    public function getBook($id){
        return $this->bookDao->getBook($id);
    }

    /**
     * To get book by id.
     * 
     * @param $id
     * @return Object $book book Object
     */
    public function storeBook($id){
        $book = Book::find($id);
        return $this->bookDao->storeBook($book);
    }

}

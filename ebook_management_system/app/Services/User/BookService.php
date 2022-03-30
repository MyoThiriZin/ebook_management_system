<?php
namespace App\Services\User;

use App\Book;
use App\Contracts\Dao\User\BookDaoInterface;
use App\Contracts\Services\User\BookServiceInterface;

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
    public function getBook($id)
    {
        return $this->bookDao->getBook($id);
    }

    /**
     * To get book by id.
     *
     * @param $id
     * @return Object $book book Object
     */
    public function storeBook($id)
    {
        $book = Book::find($id);
        return $this->bookDao->storeBook($book);
    }

    public function search($request)
    {
        return $this->bookDao->search($request);
    }

    public function index()
    {
        return $this->bookDao->index();
    }

    public function getAuthor()
    {
        return $this->bookDao->getAuthor();
    }

    public function getCategory()
    {
        return $this->bookDao->getCategory();
    }

}

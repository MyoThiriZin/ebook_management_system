<?php

namespace App\Services\User;

use App\Book;
use App\Contracts\Dao\User\BookDaoInterface;
use App\Contracts\Services\User\BookServiceInterface;

/**
 * Service class for book.
 */
class BookService implements BookServiceInterface
{
    /**
     * book Dao
     */
    private $bookDao;

    /**
     * Class Constructor
     * @param BookDaoInterface
     * @return
     */
    public function __construct(BookDaoInterface $bookDao)
    {
        $this->bookDao = $bookDao;
    }

    /**
     * To get book by id
     *
     * @param $id book id
     * @return Object $book book object
     */
    public function getBook($id)
    {
        return $this->bookDao->getBook($id);
    }

    /**
     * To save borrow book
     *
     * @param $id
     * @return Object $book book Object
     */
    public function storeBook($id)
    {
        $book = Book::find($id);
        return $this->bookDao->storeBook($book);
    }

    /**
     * To search book data
     * @param Request $request request including inputs
     * @return Object searched book object
     */
    public function search($request)
    {
        return $this->bookDao->search($request);
    }

    /**
     * To get book list
     * @return array list of books
     */
    public function index()
    {
        return $this->bookDao->index();
    }

    /**
     * To get author list
     * @return array list of authors
     */
    public function getAuthor()
    {
        return $this->bookDao->getAuthor();
    }

    /**
     * To get category list
     * @return array list of categories
     */
    public function getCategory()
    {
        return $this->bookDao->getCategory();
    }

    /**
     * To get book list
     * @return array list of book
     */
    public function get()
    {
        return $this->bookDao->get();
    }

    /**
     * To search book, category and author data
     * @param Request $request request including inputs
     * @return Object searched book object
     */
    public function searchTotal($request)
    {
        return $this->bookDao->searchTotal($request);
    }
}

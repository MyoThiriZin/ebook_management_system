<?php

namespace App\Services;

use App\Contracts\Dao\BookDaoInterface;
use App\Contracts\Services\BookServiceInterface;
use Illuminate\Http\Request;

/**
 * Book Service class
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
     * To store book
     * @param Request $request request including inputs
     * @return Object created book object
     */
    public function store(Request $request)
    {
        return $this->bookDao->store($request);
    }

    /**
     * To update book with values from request
     * @param Request $request request including inputs
     * @param string $book book
     * @return Object updated book object
     */
    public function update(Request $request, $book)
    {
        return $this->bookDao->update($request, $book);
    }

    /**
     * To delete book
     * @param integer $book book id
     * @return Object deleted book object
     */
    public function delete($book)
    {
        return $this->bookDao->delete($book);
    }
}

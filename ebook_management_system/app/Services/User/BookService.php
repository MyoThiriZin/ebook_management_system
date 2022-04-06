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
     * @param array $book 
     * @return Object $book book object
     */
    public function storeBook($id)
    {
        $book = Book::find($id);
        return $this->bookDao->storeBook($book);
    }

    /**
     * To search book with author, category and value with inputs
     * 
     * @param $request request with inputs
     * @return Object $books book object
     */
    public function search($request)
    {
        return $this->bookDao->search($request);
    }

    /**
     * To get book 
     * 
     * @return Object $books Book object
     */
    public function index()
    {
        return $this->bookDao->index();
    }

    /**
     * To get author
     * 
     * @return Object $author Author object
     */
    public function getAuthor()
    {
        return $this->bookDao->getAuthor();
    }

    /**
     * To get category
     * 
     * @return Object $category Category object
     */
    public function getCategory()
    {
        return $this->bookDao->getCategory();
    }

    /**
     * To get book
     * 
     * @return Object $book Book object
     */
    public function get()
    {
        return $this->bookDao->get();
    }

    /**
     * To search book
     * 
     * @param $request request with inputs
     * @return Object $books Book object
     */
    public function searchTotal($request)
    {
        return $this->bookDao->searchTotal($request);
    }

}

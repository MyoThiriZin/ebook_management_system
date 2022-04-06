<?php
namespace App\Services;

use App\Contracts\Dao\BookDaoInterface;
use App\Contracts\Services\BookServiceInterface;
use Illuminate\Http\Request;

class BookService implements BookServiceInterface
{
    private $bookDao;

    public function __construct(BookDaoInterface $bookDao)
    {
        $this->bookDao = $bookDao;
    }

    /**
     * To show book lists and search book data
     * 
     * @return Object book object 
     */
    public function index()
    {
        return $this->bookDao->index();
    }

    /**
     * To get author
     * 
     * @return Object get author object
     */
    public function getAuthor()
    {
        return $this->bookDao->getAuthor();
    }

    /**
     * To get category
     * 
     * @return Object get category object
     */
    public function getCategory()
    {
        return $this->bookDao->getCategory();
    }

    /**
     * To Save Book with values from request
     * 
     * @param Request $request request including inputs
     * @return Object created book object
     */
    public function store(Request $request)
    {
        return $this->bookDao->store($request);
    }

    /**
     * To update book by id
     * @param Request $request request with inputs
     * @param string $id book id
     * @return Object $book update Book
     */
    public function update(Request $request, $book)
    {
        return $this->bookDao->update($request, $book);
    }

    /**
     * To delete book by id
     * @param string $book book id
     * @return Object $book delete book
     */
    public function delete($book)
    {
        return $this->bookDao->delete($book);
    }
}

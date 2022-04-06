<?php
namespace App\Contracts\Services\User;

interface BookServiceInterface
{
    /**
     * To get book by id.
     *
     * @param $id book id
     * @return Object $book book object
     */
    public function getBook($id);

    /**
     * To save borrow book.
     *
     * @param $id book id
     * @return Object $book save book
     */
    public function storeBook($id);

    /**
     * To search book with author, category and value with inputs
     * 
     * @param $request request with inputs
     * @return Object $books book object
     */
    public function search($request);

    /**
     * To get book 
     * 
     * @return Object $books Book object
     */
    public function index();
    
    /**
     * To get book
     * 
     * @return Object $book Book object
     */
    public function get();

    /**
     * To search book
     * 
     * @param $request request with inputs
     * @return Object $books Book object
     */
    public function searchTotal($request);

    /**
     * To get author
     * 
     * @return Object $author Author object
     */
    public function getAuthor();

    /**
     * To get category
     * 
     * @return Object $category Category object
     */
    public function getCategory();
}

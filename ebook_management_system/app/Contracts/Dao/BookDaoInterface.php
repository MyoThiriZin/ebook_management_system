<?php
namespace App\Contracts\Dao;

use Illuminate\Http\Request;

/**
 * Interface of Data Access Object for book
 */
interface BookDaoInterface
{
    /**
     * To get book list
     * @return array list of books
     */
    public function index();

    /**
     * To get author list
     * @return array list of authors
     */
    public function getAuthor();

    /**
     * To get category list
     * @return array list of categories
     */
    public function getCategory();

    /**
     * To store book
     * @param Request $request request including inputs
     * @return Object created book object
     */
    public function store(Request $request);

    /**
     * To update book with values from request
     * @param Request $request request including inputs
     * @param string $book book
     * @return Object updated book object
     */
    public function update(Request $request, $book);

    /**
     * To delete book
     * @param integer $book book id
     * @return true
     */
    public function delete($book);

}

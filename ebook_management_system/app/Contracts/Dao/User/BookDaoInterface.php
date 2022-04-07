<?php

namespace App\Contracts\Dao\User;

/**
 * Interface of Data Access Object for book
 */
interface BookDaoInterface
{
    /**
     * To get book by id.
     *
     * @param integer $id book id
     * @return Object $book book object
     */
    public function getBook($id);

    /**
     * To save book
     *
     * @param array $book
     * @return Object created user object
     */
    public function storeBook($book);

    /**
     * To search book with values from request
     * @param Request $request request including inputs
     * @return Object searched book object
     */
    public function search($request);

    /**
     * To get book
     *
     * @return Object $book book object
     */
    public function index();

    /**
     * To get book
     *
     * @return Object $book book object
     */
    public function get();

    /**
     * To search book, author and category with values from request
     * @param Request $request request including inputs
     * @return Object searched book, author and category object
     */
    public function searchTotal($request);

    /**
     * To get author
     *
     * @return Object $author author object
     */
    public function getAuthor();

    /**
     * To get category
     *
     * @return Object $category category object
     */
    public function getCategory();
}

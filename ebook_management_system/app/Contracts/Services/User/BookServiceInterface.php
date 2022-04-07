<?php

namespace App\Contracts\Services\User;

/**
 * Interface for book service.
 */
interface BookServiceInterface
{
    /**
     * Get book by id
     *
     * @param $id
     * @return $book
     */
    public function getBook($id);

    /**
     * To save borrow book
     *
     * @param array $book
     */
    public function storeBook($id);

    /**
     * To search borrow book, author, category
     *
     * @param Request $request request including inputs
     * @return array $books
     */
    public function search($request);

    /**
     * To get book list
     * @return array list of books
     */
    public function index();

    /**
     * To get list
     * @return array list of categories
     */
    public function get();

    /**
     * To search borrow book, author, category
     *
     * @param Request $request request including inputs
     * @return array $books
     */
    public function searchTotal($request);

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
}

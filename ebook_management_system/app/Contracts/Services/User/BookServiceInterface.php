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
     */
    public function storeBook($id);

    public function search($request);

    public function index();

    public function get();

    public function searchTotal($request);

    public function getAuthor();

    public function getCategory();
}

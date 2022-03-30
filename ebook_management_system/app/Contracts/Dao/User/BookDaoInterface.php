<?php
namespace App\Contracts\Dao\User;

interface BookDaoInterface
{
    /**
     * To get book by id
     *
     * @param $id book id
     * @return Object $book book object
     */
    public function getBook($id);

    /**
     * To save borrow book
     *
     * @param array $book
     */
    public function storeBook($book);

    public function search($request);

    public function index();

    public function getAuthor();

    public function getCategory();
}

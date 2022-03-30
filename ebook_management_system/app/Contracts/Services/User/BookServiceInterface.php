<?php
namespace App\Contracts\Services\User;

use Illuminate\Http\Request;

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

    public function getAuthor();

    public function getCategory();
}

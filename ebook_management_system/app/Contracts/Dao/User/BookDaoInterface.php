<?php
namespace App\Contracts\Dao\User;

use Illuminate\Http\Request;

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


}

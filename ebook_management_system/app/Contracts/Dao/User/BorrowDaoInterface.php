<?php
namespace App\Contracts\Dao\User;

interface BorrowDaoInterface
{
    /**
     * To get borrow by id
     * 
     * @param $id borrow id
     * @return Object $borrow Borrow object
     */
    public function list($id);
}

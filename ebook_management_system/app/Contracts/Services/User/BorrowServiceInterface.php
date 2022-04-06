<?php

namespace App\Contracts\Services\User;

interface BorrowServiceInterface
{
    /**
     * To get borrow by id
     * 
     * @param $id borrow id
     * @return Object $borrow Borrow object
     */
    public function list($id);

}

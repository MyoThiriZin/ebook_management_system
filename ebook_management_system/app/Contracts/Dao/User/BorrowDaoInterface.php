<?php
namespace App\Contracts\Dao\User;

/**
 * Interface of Data Access Object for borrow
 */
interface BorrowDaoInterface
{
    /**
     * To get borrow list
     *
     * @param integer $id borrow id
     * @return Object $borrow borrow object
     */
    public function list($id);
}

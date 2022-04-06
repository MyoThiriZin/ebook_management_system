<?php
namespace App\Contracts\Dao;

use Illuminate\Http\Request;

/**
 * Interface of Data Access Object for borrow
 */
interface BorrowDaoInterface
{
    /**
     * To get borrow list
     * @return array list of borrowed books
     */
    public function index();

    /**
     * To delete borrow
     * @param integer $borrow borrow id
     * @return Object deleted borrow object
     */
    public function delete($borrow);

    /**
     * To send expire mail
     * @return message for success or no book rental expire mail to send
     */
    public function getRentalExpireMail();
}

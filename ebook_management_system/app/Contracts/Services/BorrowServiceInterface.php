<?php

namespace App\Contracts\Services;

/**
 * Interface for borrow service.
 */
interface BorrowServiceInterface
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

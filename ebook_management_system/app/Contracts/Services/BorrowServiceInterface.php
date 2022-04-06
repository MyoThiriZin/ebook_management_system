<?php

namespace App\Contracts\Services;

interface BorrowServiceInterface
{
    /**
     * To get borrow lists
     * 
     * @return Object $borrow Borrow object
     */
    public function index();

    /**
     * To delete borrow by id 
     * 
     * @param string $borrow Borrow id
     * @return Object $borrow delete Borrow
     */
    public function delete($borrow);

    /**
     * To send book rental expire mail
     * 
     * @return Object $bookrentalexpire
     */
    public function getRentalExpireMail();
}

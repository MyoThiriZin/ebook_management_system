<?php

namespace App\Contracts\Services\User;

/**
 * Interface for book service.
 */
interface BorrowServiceInterface
{
    /**
     * To get borrow list
     * @return array list of borrowed books
     */
    public function list($id);
}

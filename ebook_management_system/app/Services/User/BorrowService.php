<?php

namespace App\Services\User;

use App\Contracts\Dao\User\BorrowDaoInterface;
use App\Contracts\Services\User\BorrowServiceInterface;

/**
 * Service class for borrow.
 */
class BorrowService implements BorrowServiceInterface
{
    /**
     * borrow Dao
     */
    private $borrowDao;

    /**
     * Class Constructor
     * @param BorrowDaoInterface
     * @return
     */
    public function __construct(BorrowDaoInterface $borrowDao)
    {
        $this->borrowDao = $borrowDao;
    }

    /**
     * To get borrow by id
     * 
     * @param string $id borrow id
     * @return Object $borrow Borrow object
     */
    public function list($id)
    {
        return $this->borrowDao->list($id);
    }
}

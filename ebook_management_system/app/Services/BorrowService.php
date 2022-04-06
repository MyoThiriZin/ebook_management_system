<?php
namespace App\Services;

use App\Contracts\Dao\BorrowDaoInterface;
use App\Contracts\Services\BorrowServiceInterface;

/**
 * Borrow Service class
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
     * To get borrow list
     * @return array list of borrowed books
     */
    public function index()
    {
        return $this->borrowDao->index();
    }

    /**
     * To delete borrow
     * @param integer $borrow borrow id
     * @return Object deleted borrow object
     */
    public function delete($borrow)
    {
        return $this->borrowDao->delete($borrow);
    }

    /**
     * To send expire mail
     * @return message for success or no book rental expire mail to send
     */
    public function getRentalExpireMail()
    {
        return $this->borrowDao->getRentalExpireMail();
    }
}

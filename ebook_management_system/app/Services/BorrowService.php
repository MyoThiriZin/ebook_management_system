<?php
namespace App\Services;

use App\Contracts\Dao\BorrowDaoInterface;
use App\Contracts\Services\BorrowServiceInterface;

class BorrowService implements BorrowServiceInterface
{
    private $borrowDao;

    public function __construct(BorrowDaoInterface $borrowDao)
    {
        $this->borrowDao = $borrowDao;
    }

    /**
     * To show borrow books and serch borrow book info
     * 
     * @return Object borrow books object
     */
    public function index()
    {
        return $this->borrowDao->index();
    }

    /**
     * To delete borrow book by id
     * @param string $borrow borrow id
     * @return Object $borrow borrow object
     */
    public function delete($borrow)
    {
        return $this->borrowDao->delete($borrow);
    }

    /**
     * To send book rental expire mail
     * 
     * @return string $message message success or not
     */
    public function getRentalExpireMail()
    {
        return $this->borrowDao->getRentalExpireMail();
    }
}

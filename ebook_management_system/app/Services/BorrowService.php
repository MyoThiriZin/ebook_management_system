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

    public function index()
    {
        return $this->borrowDao->index();
    }

    public function delete($borrow)
    {
        return $this->borrowDao->delete($borrow);
    }

    public function getRentalExpireMail()
    {
        return $this->borrowDao->getRentalExpireMail();
    }
}

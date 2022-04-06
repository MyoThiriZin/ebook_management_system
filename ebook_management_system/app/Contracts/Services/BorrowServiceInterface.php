<?php

namespace App\Contracts\Services;

interface BorrowServiceInterface
{
    public function index();

    public function delete($borrow);

    public function getRentalExpireMail();
}

<?php
namespace App\Contracts\Dao;

use Illuminate\Http\Request;

interface BorrowDaoInterface
{
    public function index();

    public function delete($borrow);
}

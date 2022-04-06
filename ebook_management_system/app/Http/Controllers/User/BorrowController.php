<?php

namespace App\Http\Controllers\User;

use App\Borrow;
use App\Contracts\Services\User\BorrowServiceInterface;
use App\Http\Controllers\Controller;

class BorrowController extends Controller
{
    private $borrowService;

    public function __construct(BorrowServiceInterface $borrowService)
    {
        $this->borrowService = $borrowService;
    }

    /**
     * To get borrow book list by user id
     * 
     * @param $id user id
     * @return View user borrow list
     */
    public function list($id){

       $borrows = $this->borrowService->list($id);

        return view('users.borrows.userborrowlist',['items' => $borrows]);
    }
}

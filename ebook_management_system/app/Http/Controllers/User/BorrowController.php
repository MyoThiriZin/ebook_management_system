<?php

namespace App\Http\Controllers\User;

use App\Contracts\Services\User\BorrowServiceInterface;
use App\Http\Controllers\Controller;

/**
 * This is Borrow Controller.
 * This will handle borrow processing.
 */
class BorrowController extends Controller
{
    /**
     * borrow service
     */
    private $borrowService;

    /**
     * Create a new controller instance.
     * @param BorrowServiceInterface $borrowService
     * @return void
     */
    public function __construct(BorrowServiceInterface $borrowService)
    {
        $this->borrowService = $borrowService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param integer $id borrow id
     * @return \Illuminate\Http\Response
     */
    public function list($id)
    {
        $borrows = $this->borrowService->list($id);

        return view('users.borrows.userborrowlist', ['items' => $borrows]);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Borrow;
use App\Http\Controllers\Controller;
use App\Contracts\Services\BorrowServiceInterface;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $borrows = $this->borrowService->index();

        return view('borrow.index', ['items' => $borrows]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Borrow $borrow)
    {
        return view('borrow.show', ['item' => $borrow]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Borrow $borrow)
    {
        $this->borrowService->delete($borrow);

        return redirect()->route('borrows.index')->with("success_msg", deletedMessage("Borrow"));
    }

    /**
     * To send book rental expire email
     *
     * @return \Illuminate\Http\Response
     */
    public function sendBookRentalExpireMail()
    {
        $msg = $this->borrowService->getRentalExpireMail();
        return redirect()->back()->with("success_msg", $msg);
    }
}

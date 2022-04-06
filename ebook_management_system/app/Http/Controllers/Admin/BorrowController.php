<?php

namespace App\Http\Controllers\Admin;

use App\Borrow;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\Services\BorrowServiceInterface;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $borrowService;
    public function __construct(BorrowServiceInterface $borrowService)
    {
        $this->borrowService = $borrowService;
    }

    /**
     * To show borrow lists
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $borrows = $this->borrowService->index();

        return view('borrow.index',['items' => $borrows]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Borrow $borrow)
    {
        return view('borrow.show',['item' => $borrow]);
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

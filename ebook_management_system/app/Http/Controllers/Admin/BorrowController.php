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

    public function index()
    {
        $borrows = $this->borrowService->index();

        return view('borrow.index',['items' => $borrows]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
}

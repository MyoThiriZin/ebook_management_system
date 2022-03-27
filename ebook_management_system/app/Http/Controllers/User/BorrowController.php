<?php

namespace App\Http\Controllers\User;

use App\Borrow;
use App\Http\Controllers\Controller;

class BorrowController extends Controller
{
    public function list($id){

        $borrows = Borrow::with('user','book')->where('user_id', $id)->get();

        return view('users.borrows.userborrowlist',['items' => $borrows]);
    }
}

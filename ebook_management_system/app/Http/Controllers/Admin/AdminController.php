<?php

namespace App\Http\Controllers\Admin;


use App\User;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

/**
 * This is Admin Controller.
 * This will handle the showing of admin list processing.
 */
class AdminController extends Controller
{
    /**
     * To show adminprofile
     * 
     * @return View adminprofile
     */
    public function show()
    {
        $id=Auth::user()->id;
        $admininfo = User::findOrFail($id);
        return view('adminprofile')->with(['users' => $admininfo]);
    }
}

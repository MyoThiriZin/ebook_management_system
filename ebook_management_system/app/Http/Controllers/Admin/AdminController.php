<?php

namespace App\Http\Controllers\Admin;


use App\User;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function show()
    {
        $id=Auth::user()->id;
        $admininfo = User::findOrFail($id);
        return view('adminprofile')->with(['users' => $admininfo]);
    }
}

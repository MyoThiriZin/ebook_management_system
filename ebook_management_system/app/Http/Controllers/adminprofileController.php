<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use ebook_management_system;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class adminprofileController extends Controller
{
    public function show($id, Request $request){
        $admininfo = users::findOrFail($id);
        return view('adminprofile')->with('users', $admininfo);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use ebook_management_system;
use App\Http\Requests;
//use App\Http\Controllers\Controller;
class authorlistController extends Controller
{
        public function show(){
        $authorinfo = ebook_management_system::select('select * from authors');
        return view('authorlist',['authors'=>$authorinfo]);
        }
        public function searchsuthor(){

        }
        }
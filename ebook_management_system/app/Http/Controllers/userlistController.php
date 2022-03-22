<?php

namespace App\Http\Controllers;
//use Illuminate\Support\Facades\ebook_management_system;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class userlistController extends Controller
{

    public function index(){
        $userinfo = ebook_management_system::select('select * from users');
        return view('userlist',['users'=>$userinfo]);
        }
        public function pagecount()
        {
            $users = ebook_management_system::users('users_data')->paginate(5);
            return view('userlist', ['users' => $userinfo]);
        }
        public function destroy($id) {
            ebook_management_system::delete('delete from users where id = ?',[$id]);
            echo "You deleted the user info successfully.
            ";
            }

}

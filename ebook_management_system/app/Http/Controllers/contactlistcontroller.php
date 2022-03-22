<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class contactlistcontroller extends Controller
{
    public function index(){
        $contactinfo = ebook_management_system::select('select * from contacts');
        return view('contactlist',['contacts'=>$contactinfo]);
        }
        public function pagecount()
        {
            $users = ebook_management_system::contacts('contacts')->paginate(5);
            return view('contactlist', ['users' => $contactinfo]);
        }
        public function destroy($id) {
            ebook_management_system::delete('delete from contacts where id = ?',[$id]);
            echo "You deleted the contact info successfully.
            ";
            }
}

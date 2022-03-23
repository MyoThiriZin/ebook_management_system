<?php
namespace App\Contracts\Dao;

use Illuminate\Http\Request;

interface UserDaoInterface
{
    public function index();
    
    public function delete($user);

}

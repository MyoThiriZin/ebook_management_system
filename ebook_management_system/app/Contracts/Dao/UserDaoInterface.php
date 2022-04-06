<?php
namespace App\Contracts\Dao;

use Illuminate\Http\Request;

interface UserDaoInterface
{
    /**
     * To get user lists
     * 
     * @return Object $user User lists
     */
    public function index();

    /**
     * To delete user by id
     * 
     * @param $id user id
     * @return Object $user delete user
     */
    public function delete($user);

}

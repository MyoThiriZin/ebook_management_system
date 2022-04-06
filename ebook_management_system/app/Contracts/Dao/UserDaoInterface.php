<?php
namespace App\Contracts\Dao;

/**
 * Interface of Data Access Object for user
 */
interface UserDaoInterface
{
    /**
     * To get user list
     * @return array list of users
     */
    public function index();
    
    /**
     * To delete user
     * @param integer $user user id
     * @return true
     */
    public function delete($user);

}

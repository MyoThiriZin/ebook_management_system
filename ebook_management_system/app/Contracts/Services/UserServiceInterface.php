<?php

namespace App\Contracts\Services;

/**
 * Interface for category service.
 */
interface UserServiceInterface
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

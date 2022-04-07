<?php

namespace App\Services;

use App\Contracts\Dao\UserDaoInterface;
use App\Contracts\Services\UserServiceInterface;

/**
 * User Service class
 */
class UserService implements UserServiceInterface
{
    /**
     * user Dao
     */
    private $userDao;

    /**
     * Class Constructor
     * @param UserDaoInterface
     * @return
     */
    public function __construct(UserDaoInterface $userDao)
    {
        $this->userDao = $userDao;
    }

    /**
     * To get user list
     * @return array list of users
     */
    public function index()
    {
        return $this->userDao->index();
    }

    /**
     * To delete user
     * @param integer $user user id
     * @return Object deleted user object
     */
    public function delete($user)
    {
        return $this->userDao->delete($user);
    }
}

<?php
namespace App\Services;

use Illuminate\Http\Request;
use App\Contracts\Dao\UserDaoInterface;
use App\Contracts\Services\UserServiceInterface;

class UserService implements UserServiceInterface
{

    private $userDao;

    public function __construct(UserDaoInterface $userDao)
    {
        $this->userDao = $userDao;
    }

    /**
     * To search user
     * 
     * @return Object user 
     */
    public function index()
    {
        return $this->userDao->index();
    }

    /**
     * To delete user by id
     * 
     * @param string $id user id
     * @return true
     */
    public function delete($user)
    {

        return $this->userDao->delete($user);
    }
}

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

    public function index(){
        return $this->userDao->index();
    }

    public function delete($user){

        return $this->userDao->delete($user);
    }
}

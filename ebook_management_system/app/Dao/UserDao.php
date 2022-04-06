<?php
namespace App\Dao;

use App\User;
use Illuminate\Http\Request;
use App\Contracts\Dao\UserDaoInterface;

class UserDao implements UserDaoInterface
{
    private $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    /**
     * To search user
     * 
     * @return Object user 
     */
    public function index()
    {
        return $this->model->when($search = request('searchData'), function ($query) use ($search) {
                        $query->where('name', 'LIKE', '%' . $search . '%')
                        ->orWhere('id', 'LIKE', '%' . $search . '%')
                        ->orWhere('email', 'LIKE', '%' . $search . '%')
                        ->orWhere('phone_no', 'LIKE', '%' . $search . '%')
                        ->orWhere('address', 'LIKE', '%' . $search . '%')
                        ->orWhere('type', 'LIKE', '%' . $search . '%');
                        })->latest()->paginate(10);
    }

    /**
     * To delete user by id
     * 
     * @param string $id user id
     * @return true
     */
    public function delete($id)
    {
        $this->model->where('id', $id)->delete();
        return true;
    }

}

<?php
namespace App\Dao\User;

use App\Borrow;
use App\Contracts\Dao\User\BorrowDaoInterface;

class BorrowDao implements BorrowDaoInterface
{
    private $model;

    public function __construct(Borrow $model)
    {
        $this->model = $model;
    }

    public function list($id)
    {
        return $this->model->with('user', 'book')->where('user_id', $id)->get();
    }

}

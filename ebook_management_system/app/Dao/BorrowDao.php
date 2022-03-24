<?php
namespace App\Dao;

use App\Borrow;
use App\Contracts\Dao\BorrowDaoInterface;

class BorrowDao implements BorrowDaoInterface
{
    private $model;

    public function __construct(Borrow $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        return $this->model->when($search = request('searchData'), function ($query) use ($search) {
            $query->where('start_date', 'LIKE', '%' . $search . '%')
                ->orWhere('end_date', 'LIKE', '%' . $search . '%')
                ->orWhere(function ($query) use ($search) {
                    $query->whereHas('user', function ($qry) use ($search) {
                        $qry->where('name', 'LIKE', '%' . $search . '%');
                    });
                })
                ->orWhere(function ($query) use ($search) {
                    $query->whereHas('book', function ($qry) use ($search) {
                        $qry->where('name', 'LIKE', '%' . $search . '%');
                    });
                });
        })->latest()->paginate(5);

    }

    public function delete($borrow)
    {
        return $borrow->delete($borrow);
    }

}

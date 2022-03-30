<?php
namespace App\Dao\User;

use App\Contact;
use App\Contracts\Dao\User\ContactDaoInterface;

class ContactDao implements ContactDaoInterface
{
    private $model;

    public function __construct(Contact $model)
    {
        $this->model = $model;
    }

    public function store(Array $data)
    {
        return $this->model->create($data);
    }
}

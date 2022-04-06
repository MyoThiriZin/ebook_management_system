<?php
namespace App\Dao\User;

use App\Contact;
use App\Contracts\Dao\User\ContactDaoInterface;

/**
 * Data Access Object for Contact
 */
class ContactDao implements ContactDaoInterface
{
    /**
     * model
     */
    private $model;

    /**
     * Class Constructor
     * @param Contact
     * @return
     */
    public function __construct(Contact $model)
    {
        $this->model = $model;
    }

    /**
     * To store contactus
     * @param array $data data of inputs
     * @return Object created contact object
     */
    public function store(Array $data)
    {
        return $this->model->create($data);
    }
}

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
     * To save feedback
     * 
     * @param array $data request with inputs
     * @return Object $feedback Feedback object
     */
    public function store(Array $data)
    {
        return $this->model->create($data);
    }
}

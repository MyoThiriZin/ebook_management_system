<?php
namespace App\Services\User;

use App\Contracts\Dao\User\ContactDaoInterface;
use App\Contracts\Services\User\ContactServiceInterface;

class ContactService implements ContactServiceInterface
{

    private $contactDao;

    public function __construct(ContactDaoInterface $contactDao)
    {
        $this->contactDao = $contactDao;
    }

    /**
     * To save feedback
     * 
     * @param array $data request with inputs
     * @return Object $feedback Feedback object
     */
    public function store(Array $data)
    {
        return $this->contactDao->store($data);
    }

}

<?php

namespace App\Services\User;

use App\Contracts\Dao\User\ContactDaoInterface;
use App\Contracts\Services\User\ContactServiceInterface;

/**
 * Service class for contact.
 */
class ContactService implements ContactServiceInterface
{
    /**
     * contact Dao
     */
    private $contactDao;

    /**
     * Class Constructor
     * @param ContactDaoInterface
     * @return
     */
    public function __construct(ContactDaoInterface $contactDao)
    {
        $this->contactDao = $contactDao;
    }

    /**
     * To store contact data
     * @param array $data data of contact
     * @return Object created contact object
     */
    public function store(array $data)
    {
        return $this->contactDao->store($data);
    }
}

<?php
namespace App\Contracts\Dao\User;

/**
 * Interface of Data Access Object for contact
 */
interface ContactDaoInterface
{
    /**
     * To save contact
     *
     * @param array $data
     * @return Object created data object
     */
    function store(Array $data);
}

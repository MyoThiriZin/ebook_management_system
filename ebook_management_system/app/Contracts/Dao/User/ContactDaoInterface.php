<?php
namespace App\Contracts\Dao\User;

interface ContactDaoInterface
{
    /**
     * To save feedback
     * 
     * @param array $data 
     * @return Object $feedback Feedback object
     */
    function store(Array $data);
}

<?php

namespace App\Contracts\Services\User;

interface ContactServiceInterface
{
    /**
     * To save feedback
     * 
     * @param array $data 
     * @return Object $feedback Feedback object
     */
    public function store(Array $data);
}

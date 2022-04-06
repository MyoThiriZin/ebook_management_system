<?php

namespace App\Contracts\Services\User;

/**
 * Interface for book service.
 */
interface ContactServiceInterface
{
    /**
     * To store contactus
     * @param array $data data of inputs
     * @return Object created contact object
     */
    public function store(Array $data);
}

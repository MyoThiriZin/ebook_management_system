<?php

namespace App\Contracts\Services;

/**
 * Interface for category service.
 */
interface ContactUsServiceInterface
{
    /**
     * To get contactus list
     * @return array list of contactus
     */
    public function index();

    /**
     * To delete contactus
     * @param integer $id contactus id
     * @return true
     */
    public function delete($id);
}

<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Contracts\Dao\ContactUsDaoInterface;
use App\Contracts\Services\ContactUsServiceInterface;

/**
 * ContactUs Service class
 */
class ContactUsService implements ContactUsServiceInterface
{
    /**
     * contactus Dao
     */
    private $contactusDao;

    /**
     * Class Constructor
     * @param ContactUsDaoInterface
     * @return
     */
    public function __construct(ContactUsDaoInterface $contactusDao)
    {
        $this->contactusDao = $contactusDao;
    }

    /**
     * To get contactus list
     * @return array list of contactus
     */
    public function index()
    {
        return $this->contactusDao->index();
    }

    /**
     * To delete contactus
     * @param integer $id contactus id
     * @return Object deleted contactus object
     */
    public function delete($id)
    {
        return $this->contactusDao->delete($id);
    }
}

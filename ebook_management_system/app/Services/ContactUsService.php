<?php
namespace App\Services;

use Illuminate\Http\Request;
use App\Contracts\Dao\ContactUsDaoInterface;
use App\Contracts\Services\ContactUsServiceInterface;

class ContactUsService implements ContactUsServiceInterface
{

    private $contactusDao;

    public function __construct(ContactUsDaoInterface $contactusDao)
    {
        $this->contactusDao = $contactusDao;
    }

    /**
     * To search feedback
     * 
     * @return Object feedback 
     */
    public function index()
    {
        return $this->contactusDao->index();
    }

    /**
     * To delete feedback by id
     * 
     * @param string $id feedback id
     * @return true
     */
    public function delete($id)
    {

        return $this->contactusDao->delete($id);
    }
}

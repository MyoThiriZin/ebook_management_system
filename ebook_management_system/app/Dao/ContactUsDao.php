<?php
namespace App\Dao;

use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use App\Contracts\Dao\ContactUsDaoInterface;

/**
 * Data Access Object for Contactus
 */
class ContactUsDao implements ContactUsDaoInterface
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
     * To get contactus list
     * @return array list of contactus
     */
    public function index()
    {
        return $this->model->when($search = request('searchData'), function ($query) use ($search) {
                        $query->where('name', 'LIKE', '%' . $search . '%')
                        ->orWhere('email', 'LIKE', '%' . $search . '%')
                        ->orWhere('message', 'LIKE', '%' . $search . '%')
                        ->orWhere('phone_no', 'LIKE', '%' . $search . '%');
                        })->latest()->paginate(10);
    }

    /**
     * To delete contactus
     * @param integer $id contactus id
     * @return true
     */
    public function delete($id)
    {
        $this->model->where('id', $id)->delete();
        
        return true;
    }

}

<?php
namespace App\Dao;

use App\Contact;
use Illuminate\Http\Request;
use App\Contracts\Dao\ContactUsDaoInterface;

class ContactUsDao implements ContactUsDaoInterface
{
    private $model;

    public function __construct(Contact $model)
    {
        $this->model = $model;
    }

    /**
     * To search feedback
     * 
     * @return Object feedback 
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
     * To delete feedback by id
     * 
     * @param string $id feedback id
     * @return true
     */
    public function delete($id)
    {

        $this->model->where('id', $id)->delete();
        
        return true;
    }

}

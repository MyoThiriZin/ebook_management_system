<?php
namespace App\Dao;

use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use App\Contracts\Dao\ContactUsDaoInterface;

class ContactUsDao implements ContactUsDaoInterface
{
    private $model;

    public function __construct(Contact $model)
    {
        $this->model = $model;
    }

    public function index(){

    return $this->model->when($search = request('searchData'), function ($query) use ($search) {
                    $query->where('name', 'LIKE', '%' . $search . '%')
                    ->orWhere('email', 'LIKE', '%' . $search . '%')
                    ->orWhere('message', 'LIKE', '%' . $search . '%')
                    ->orWhere('phone_no', 'LIKE', '%' . $search . '%');
                    })->latest()->paginate(10);
    }

    public function delete($id){

        $this->model->where('id', $id)->delete();
        
        return true;
    }

}

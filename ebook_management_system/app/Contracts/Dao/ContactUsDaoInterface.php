<?php
namespace App\Contracts\Dao;

use Illuminate\Http\Request;

interface ContactUsDaoInterface
{
    /**
     * To get feedback lists
     * 
     * @return Object $feedback feecback lists
     */
    public function index();

    /**
     * To delete feedback by id
     * 
     * @param $id feedback id
     * @return Object $feedback delete Feedback
     */
    public function delete($id);

}

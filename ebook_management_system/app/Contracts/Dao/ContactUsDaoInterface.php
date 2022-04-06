<?php
namespace App\Contracts\Dao;

use Illuminate\Http\Request;

/**
 * Interface of Data Access Object for contact us
 */
interface ContactUsDaoInterface
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

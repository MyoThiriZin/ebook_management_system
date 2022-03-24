<?php
namespace App\Contracts\Dao;

use Illuminate\Http\Request;

interface ContactUsDaoInterface
{
    public function index();

    public function delete($id);

}

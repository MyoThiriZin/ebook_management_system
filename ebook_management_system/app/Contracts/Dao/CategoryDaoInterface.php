<?php

namespace App\Contracts\Dao;

use Illuminate\Http\Request;

interface CategoryDaoInterface
{
    public function index();

    public function store(Array $data);

    public function update($request, $id);

    public function destory($id);

    public function search($request);

}

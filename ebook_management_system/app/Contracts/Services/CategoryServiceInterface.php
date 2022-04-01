<?php

namespace App\Contracts\Services;

use Illuminate\Http\Request;

interface CategoryServiceInterface
{
    public function index();

    public function store(Array $data);

    public function update($request, $id);

    public function destory($id);

    public function search($request);
}

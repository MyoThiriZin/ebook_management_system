<?php
namespace App\Contracts\Services;

use Illuminate\Http\Request;

interface UserServiceInterface
{
    public function index();

    public function delete($user);

}

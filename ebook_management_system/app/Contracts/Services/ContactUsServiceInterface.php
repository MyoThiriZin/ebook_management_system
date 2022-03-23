<?php
namespace App\Contracts\Services;

use Illuminate\Http\Request;

interface ContactUsServiceInterface
{
    public function index();

    public function delete($id);

}

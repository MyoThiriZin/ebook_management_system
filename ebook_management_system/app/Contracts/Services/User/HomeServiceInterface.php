<?php

namespace App\Contracts\Services\User;

use Illuminate\Http\Request;

interface HomeServiceInterface
{
  public function getbooks();

  public function getauthors();

  public function getcategories();

}
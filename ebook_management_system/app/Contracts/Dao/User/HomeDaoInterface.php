<?php

namespace App\Contracts\Dao\User;

use Illuminate\Http\Request;

interface HomeDaoInterface {
  public function getbooks();

  public function getauthors();

  public function getcategories();

}
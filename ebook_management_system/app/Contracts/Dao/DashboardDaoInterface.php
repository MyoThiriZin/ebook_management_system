<?php

namespace App\Contracts\Dao;

use Illuminate\Http\Request;

interface DashboardDaoInterface {
  public function getchart();

  public function getbooks();

  public function getauthors();

  public function getcategories();

}
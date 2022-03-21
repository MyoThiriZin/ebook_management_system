<?php

namespace App\Contracts\Services;

use Illuminate\Http\Request;

interface DashboardServiceInterface
{
  public function getchart();

  public function getbooks();

  public function getauthors();

  public function getcategories();
}
<?php

namespace App\Contracts\Services;

interface DashboardServiceInterface
{
  public function getchart();

  public function getbooks();

  public function getauthors();

  public function getcategories();
}
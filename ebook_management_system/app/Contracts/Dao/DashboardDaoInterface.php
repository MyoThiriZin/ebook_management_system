<?php

namespace App\Contracts\Dao;

interface DashboardDaoInterface 
{
  public function getchart();

  public function getbooks();

  public function getauthors();

  public function getcategories();

}
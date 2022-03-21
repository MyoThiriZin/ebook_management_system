<?php

namespace App\Services;

use App\Contracts\Dao\DashboardDaoInterface;
use App\Contracts\Services\DashboardServiceInterface;
use Illuminate\Http\Request;

class DashboardService implements DashboardServiceInterface
{
    private $dashboardDaoInterface;

    public function __construct(DashboardDaoInterface $dashboardDaoInterface)
    {
        $this->dashboardDaoInterface = $dashboardDaoInterface;
    }

    public function getchart()
    {
        return $this->dashboardDaoInterface->getchart();
    }

    public function getbooks()
    {
        return $this->dashboardDaoInterface->getbooks();
    }

    public function getauthors()
    {
        return $this->dashboardDaoInterface->getauthors();
    }

    public function getcategories()
    {
        return $this->dashboardDaoInterface->getcategories();
    }
}
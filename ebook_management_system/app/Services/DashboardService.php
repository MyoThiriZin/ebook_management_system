<?php

namespace App\Services;

use App\Contracts\Dao\DashboardDaoInterface;
use App\Contracts\Services\DashboardServiceInterface;

/**
 * Dashboard Service class
 */
class DashboardService implements DashboardServiceInterface
{
    /**
     * dashboard Dao Interface
     */
    private $dashboardDaoInterface;

    /**
     * Class Constructor
     * @param DashboardDaoInterface
     * @return
     */
    public function __construct(DashboardDaoInterface $dashboardDaoInterface)
    {
        $this->dashboardDaoInterface = $dashboardDaoInterface;
    }

    /**
     * To get chart of user counts
     * @return array list of book labels and user counts
     */
    public function getchart()
    {
        return $this->dashboardDaoInterface->getchart();
    }

    /**
     * To get book list
     * @return array list of books
     */
    public function getbooks()
    {
        return $this->dashboardDaoInterface->getbooks();
    }

    /**
     * To get author list
     * @return array list of authors
     */
    public function getauthors()
    {
        return $this->dashboardDaoInterface->getauthors();
    }

    /**
     * To get category list
     * @return array list of categories
     */
    public function getcategories()
    {
        return $this->dashboardDaoInterface->getcategories();
    }
}
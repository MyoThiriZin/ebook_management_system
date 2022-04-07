<?php

namespace App\Contracts\Services;

/**
 * Interface for dashboard service.
 */
interface DashboardServiceInterface
{
    /**
     * To get chart of user counts
     * @return array list of book labels and user counts
     */
    public function getchart();

    /**
     * To get book list
     * @return array list of books
     */
    public function getbooks();

    /**
     * To get author list
     * @return array list of authors
     */
    public function getauthors();

    /**
     * To get category list
     * @return array list of categories
     */
    public function getcategories();
}

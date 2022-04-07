<?php

namespace App\Contracts\Dao\User;

/**
 * Interface of Data Access Object for Home
 */
interface HomeDaoInterface
{
    /**
     * To get book
     *
     * @return Object $books book object
     */
    public function getbooks();

    /**
     * To get author
     *
     * @return Object $authors author object
     */
    public function getauthors();

    /**
     * To get category
     *
     * @return Object $categories category object
     */
    public function getcategories();
}

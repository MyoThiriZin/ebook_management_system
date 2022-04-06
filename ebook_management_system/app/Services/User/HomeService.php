<?php

namespace App\Services\User;

use App\Contracts\Dao\User\HomeDaoInterface;
use App\Contracts\Services\User\HomeServiceInterface;
use Illuminate\Http\Request;

/**
 * Service class for home.
 */
class HomeService implements HomeServiceInterface
{
    /**
     * home Dao Interface
     */
    private $homeDaoInterface;

    /**
     * Class Constructor
     * @param HomeDaoInterface
     * @return
     */
    public function __construct(HomeDaoInterface $homeDaoInterface)
    {
        $this->homeDaoInterface = $homeDaoInterface;
    }

    /**
     * To get book list
     * @return array list of books
     */
    public function getbooks()
    {
        return $this->homeDaoInterface->getbooks();
    }

    /**
     * To get author list
     * @return array list of authors
     */
    public function getauthors()
    {
        return $this->homeDaoInterface->getauthors();
    }

    /**
     * To get category list
     * @return array list of categories
     */
    public function getcategories()
    {
        return $this->homeDaoInterface->getcategories();
    }
}
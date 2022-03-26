<?php

namespace App\Services\User;

use App\Contracts\Dao\User\HomeDaoInterface;
use App\Contracts\Services\User\HomeServiceInterface;
use Illuminate\Http\Request;

class HomeService implements HomeServiceInterface
{
    private $homeDaoInterface;

    public function __construct(HomeDaoInterface $homeDaoInterface)
    {
        $this->homeDaoInterface = $homeDaoInterface;
    }

    public function getbooks()
    {
        return $this->homeDaoInterface->getbooks();
    }

    public function getauthors()
    {
        return $this->homeDaoInterface->getauthors();
    }

    public function getcategories()
    {
        return $this->homeDaoInterface->getcategories();
    }
 
}
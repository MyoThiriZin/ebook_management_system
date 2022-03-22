<?php

namespace App\Services;

use App\Contracts\Dao\AuthorDaoInterface;
use App\Contracts\Services\AuthorServiceInterface;
use Illuminate\Http\Request;

class AuthorService implements AuthorServiceInterface
{
    private $authorDaoInterface;

    public function __construct(authorDaoInterface $authorDaoInterface)
    {
        $this->authorDaoInterface = $authorDaoInterface;
    }

    public function getauthors(Request $request)
    {
        return $this->authorDaoInterface->getauthors($request);
    }

    public function store(Request $request)
    {
        return $this->authorDaoInterface->store($request);
    }

    public function deleteById($id)
    {
        return $this->authorDaoInterface->deleteById($id);
    }

    public function editAuthor($id)
    {
        return $this->authorDaoInterface->editAuthor($id);
    }

    public function updateInfo(Request $request, $id)
    {
        return $this->authorDaoInterface->updateInfo($request, $id);
    }

    public function detailAuthor($id)
    {
        return $this->authorDaoInterface->detailAuthor($id);
    }

    public function authorsSearch($search){

        return $this->authorDaoInterface->authorsSearch($search);
    }

}
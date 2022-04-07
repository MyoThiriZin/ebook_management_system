<?php

namespace App\Services;

use App\Contracts\Dao\AuthorDaoInterface;
use App\Contracts\Services\AuthorServiceInterface;
use Illuminate\Http\Request;

/**
 * Author Service class
 */
class AuthorService implements AuthorServiceInterface
{
    /**
     * author Dao Interface
     */
    private $authorDaoInterface;

    /**
     * Class Constructor
     * @param authorDaoInterface
     * @return
     */
    public function __construct(authorDaoInterface $authorDaoInterface)
    {
        $this->authorDaoInterface = $authorDaoInterface;
    }

    /**
     * To get author list
     * @param Request $request request including inputs
     * @return array list of authors
     */
    public function getauthors(Request $request)
    {
        return $this->authorDaoInterface->getauthors($request);
    }

    /**
     * To store author
     * @param Request $request request including inputs
     * @return Object created author object
     */
    public function store(Request $request)
    {
        return $this->authorDaoInterface->store($request);
    }

    /**
     * To delete author by id
     * @param integer $id author id
     * @return Object deleted author object
     */
    public function deleteById($id)
    {
        return $this->authorDaoInterface->deleteById($id);
    }

    /**
     * To show author edit form by id
     * @param integer $id author id
     * @return Object found author object
     */
    public function editAuthor($id)
    {
        return $this->authorDaoInterface->editAuthor($id);
    }

    /**
     * To update author with values from request
     * @param Request $request request including inputs
     * @param integer $id author id
     * @return Object updated author object
     */
    public function updateInfo(Request $request, $id)
    {
        return $this->authorDaoInterface->updateInfo($request, $id);
    }

    /**
     * To see detail about author by id
     * @param integer $id author id
     * @return Object found author object
     */
    public function detailAuthor($id)
    {
        return $this->authorDaoInterface->detailAuthor($id);
    }

    /**
     * To search author data
     * @param Request $request request including inputs
     * @return Object searched author object
     */
    public function authorsSearch($search)
    {
        return $this->authorDaoInterface->authorsSearch($search);
    }
}

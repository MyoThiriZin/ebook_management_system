<?php

namespace App\Contracts\Services;

use Illuminate\Http\Request;

/**
 * Interface for book service.
 */
interface AuthorServiceInterface
{
    /**
     * To get author
     * @param Request $request request including inputs
     * @return array list of authors with pagination 10
     */
    public function getauthors(Request $request);

    /**
     * To store author
     * @param Request $request request including inputs
     * @return Object created author object
     */
    public function store(Request $request);

    /**
     * To delete author by id
     * @param integer $id author id
     * @return Object deleted author object
     */
    public function deleteById($id);

    /**
     * To show author edit form by id
     * @param integer $id author id
     * @return Object found or failed author object
     */
    public function editAuthor($id);

    /**
     * To update author with values from request
     * @param Request $request request including inputs
     * @param integer $id author id
     * @return Object updated author object
     */
    public function updateInfo(Request $request, $id);

    /**
     * To see detail about author by id
     * @param integer $id author id
     * @return Object found author object
     */
    public function detailAuthor($id);

    /**
     * To search author data
     * @param Request $request request including inputs
     * @return Object searched author object
     */
    public function authorsSearch($search);
}

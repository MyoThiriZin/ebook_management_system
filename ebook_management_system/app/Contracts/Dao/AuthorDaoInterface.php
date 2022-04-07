<?php

namespace App\Contracts\Dao;

use Illuminate\Http\Request;

/**
 * Interface of Data Access Object for author
 */
interface AuthorDaoInterface
{
    /**
     * To get author
     *
     * @param Request $request request including inputs
     * @return Object $authors author object
     */
    public function getauthors(Request $request);

    /**
     * To save author
     *
     * @param Request $request request including inputs
     * @return Object created author object
     */
    public function store(Request $request);

    /**
     * To delete author by id
     *
     * @param integer $id author id
     * @return Object $authors author object
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

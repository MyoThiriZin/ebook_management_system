<?php

namespace App\Contracts\Services;

use Illuminate\Http\Request;

/**
 * Interface for category service.
 */
interface CategoryServiceInterface
{
    /**
     * To get category list
     * @return array list of categories order by descending of created_at with pagination 10
     */
    public function index();

    /**
     * To store category data
     * @param array data form request
     * @return Object created category object
     */
    public function store(Array $data);

    /**
     * To update category data
     * @param Request $request request including inputs
     * @param integer $id category id
     * @return Object updated category object
     */
    public function update($request, $id);

    /**
     * To delete category by id
     * @param integer $id user id
     * @return Object deleted category object
     */
    public function destory($id);

    /**
     * To search category data
     * @param Request $request request including inputs
     * @return Object searched category object
     */
    public function search($request);
}

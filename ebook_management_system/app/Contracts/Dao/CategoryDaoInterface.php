<?php

namespace App\Contracts\Dao;

use Illuminate\Http\Request;

/**
 * Interface of Data Access Object for category
 */
interface CategoryDaoInterface
{
    /**
     * To get category list
     * @return array list of categories 
     */
    public function index();

    /**
     * To store category data
     * @param array data form request
     * @return Object created category object
     */
    public function store(array $data);

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

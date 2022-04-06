<?php

namespace App\Contracts\Services;

use Illuminate\Http\Request;

interface CategoryServiceInterface
{
    /**
     * To get category list
     * @return array $boollist Category list
     */
    public function index();

    /**
     * To save category 
     * 
     * @param Request $request request with inputs
     * @return Object $category save category
     */
    public function store(Array $data);

    /**
     * To update category by id 
     * 
     * @param Request $request request with inputs
     * @param string $category Category id
     * @return Object $category update category
     */
    public function update($request, $id);

    /**
     * To delete category by id 
     * 
     * @param string $category Category id
     * @return Object $category delete category
     */
    public function destory($id);

    /**
     * To search category
     * 
     * @param $request request with inputs
     * @return Object $category search category
     */
    public function search($request);
}

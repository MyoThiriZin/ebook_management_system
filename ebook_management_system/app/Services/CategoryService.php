<?php

namespace App\Services;

use App\Contracts\Dao\CategoryDaoInterface;
use App\Contracts\Services\CategoryServiceInterface;

/**
 * Category Service class
 */
class CategoryService implements CategoryServiceInterface
{
    /**
     * category Dao
     */
    private $categoryDao;

    /**
     * Class Constructor
     * @param CategoryDaoInterface
     * @return
     */
    public function __construct(CategoryDaoInterface $categoryDao)
    {
        $this->categoryDao = $categoryDao;
    }

    /**
     * To get category list
     * @return array list of categories
     */
    public function index()
    {
        return $this->categoryDao->index();
    }

    /**
     * To store category
     * @param array $data data of category
     * @return Object created category object
     */
    public function store(array $data)
    {
        return $this->categoryDao->store($data);
    }

    /**
     * To update category with values from request
     * @param Request $request request including inputs
     * @param integer $id category id
     * @return Object updated category object
     */
    public function update($request, $id)
    {
        return $this->categoryDao->update($request, $id);
    }

    /**
     * To destory category
     * @param integer $id category id
     * @return Object deleted category object
     */
    public function destory($id)
    {
        return $this->categoryDao->destory($id);
    }

    /**
     * To search category data
     * @param Request $request request including inputs
     * @return Object searched category object
     */
    public function search($request)
    {
        return $this->categoryDao->search($request);
    }
}

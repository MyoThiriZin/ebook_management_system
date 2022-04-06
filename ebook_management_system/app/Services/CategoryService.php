<?php
namespace App\Services;

use App\Contracts\Dao\CategoryDaoInterface;
use App\Contracts\Services\CategoryServiceInterface;

class CategoryService implements CategoryServiceInterface
{
    private $categoryDao;

    public function __construct(CategoryDaoInterface $categoryDao)
    {
        $this->categoryDao = $categoryDao;
    }

    /**
     * To get category
     * 
     * @return Object $category category object
     */
    public function index()
    {
        return $this->categoryDao->index();
    }

    /**
     * To save category values with input
     * 
     * @param array $data request with inputs
     * @return Object created category object
     */
    public function store(Array $data)
    {
        return $this->categoryDao->store($data);
    }

    /**
     * To update category by id
     * 
     * @param $request request with inputs
     * @param string $id category id
     * @return Object $category Category object
     */
    public function update($request, $id)
    {
        return $this->categoryDao->update($request, $id);
    }

    /**
     * To delete category by id
     * 
     * @param $id category id
     * @return Object $category Category object
     */
    public function destory($id)
    {
        return $this->categoryDao->destory($id);
    }

    /**
     * To search category
     * 
     * @param $request request with input
     * @return Object $categories Category object
     */
    public function search($request)
    {
        return $this->categoryDao->search($request);
    }

}

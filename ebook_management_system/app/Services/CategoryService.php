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

    public function index()
    {
        return $this->categoryDao->index();
    }

    public function store(Array $data)
    {
        return $this->categoryDao->store($data);
    }

    public function update($request, $id)
    {
        return $this->categoryDao->update($request, $id);
    }

    public function destory($id)
    {
        return $this->categoryDao->destory($id);
    }

    public function search($request)
    {
        return $this->categoryDao->search($request);
    }

}

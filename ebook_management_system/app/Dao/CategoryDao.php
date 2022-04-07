<?php

namespace App\Dao;

use App\Category;
use App\Contracts\Dao\CategoryDaoInterface;

/**
 * Data Access Object for Category
 */
class CategoryDao implements CategoryDaoInterface
{
    /**
     * model
     */
    private $model;

    /**
     * Class Constructor
     * @param Category
     * @return
     */
    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    /**
     * To get category list
     * @return array list of categories order by descending of created_at with pagination 10
     */
    public function index()
    {
        return $this->model->latest()->orderBy('created_at', 'desc')->paginate(10);
    }

    /**
     * To store category data
     * @param array data form request
     * @return Object created category object
     */
    public function store(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * To update category data
     * @param Request $request request including inputs
     * @param integer $id category id
     * @return Object updated category object
     */
    public function update($request, $id)
    {
        $category = category::find($id);
        $category->name = $request->name;
        $category->save();

        return $category;
    }

    /**
     * To delete category by id
     * @param integer $id category id
     * @return Object deleted category object
     */
    public function destory($id)
    {
        $category = category::find($id);
        foreach ($category->books as $book) {
            $book->borrow()->delete();
            $book->delete();
        }
        $category->delete();
        return $category;
    }

    /**
     * To search category data
     * @param Request $request request including inputs
     * @return Object searched category object
     */
    public function search($request)
    {
        $search = $request->input('search');
        $categories = category::query()
            ->where('id', 'LIKE', "%{$search}%")
            ->orWhere('name', 'LIKE', "%{$search}%")
            ->latest()->paginate(10);

        return $categories;
    }
}

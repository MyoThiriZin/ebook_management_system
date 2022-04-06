<?php
namespace App\Dao;

use App\Category;
use App\Contracts\Dao\CategoryDaoInterface;

class CategoryDao implements CategoryDaoInterface
{
    private $model;

    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    /**
     * To get category
     * 
     * @return Object $category category object
     */
    public function index()
    {
        return $this->model->latest()->orderBy('created_at', 'desc')->paginate(10);
    }

    /**
     * To save category values with input
     * 
     * @param array $data request with inputs
     * @return Object created category object
     */
    public function store(array $data)
    {
        return $this->model->create($data);
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
        $category = category::find($id);
        $category->name = $request->name;
        $category->save();

        return $category;
    }

    /**
     * To delete category by id
     * 
     * @param $id category id
     * @return Object $category Category object
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
     * To search category
     * 
     * @param $request request with input
     * @return Object $categories Category object
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

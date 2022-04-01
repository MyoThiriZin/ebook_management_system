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

    public function index()
    {
        return $this->model->latest()->orderBy('created_at', 'desc')->paginate(10);
    }

    public function store(array $data)
    {
        return $this->model->create($data);
    }

    public function update($request, $id)
    {
        $category = category::find($id);
        $category->name = $request->name;
        $category->save();

        return $category;
    }

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

<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Contracts\Services\CategoryServiceInterface;
use App\Export\CategoriesExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\storeCategoryRequest;
use App\Http\Requests\updateCategoryRequest;
use App\Import\CategoriesImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

/**
 * This is Category Controller.
 * This will handle category CRUD processing.
 */
class CategoryController extends Controller
{
    /**
     * category service
     */
    private $categoryService;

    /**
     * Create a new controller instance.
     * @param CategoryServiceInterface $categoryService
     * @return void
     */
    public function __construct(CategoryServiceInterface $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->categoryService->index();

        return view('category.index', [
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\storeCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeCategoryRequest $request)
    {
        $this->categoryService->store($request->validated());

        return redirect()->back()->with("success_msg", createdMessage("Category"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        return view('category.edit', [
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecategoryRequest  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(updateCategoryRequest $request, $id)
    {
        $this->categoryService->update($request, $id);

        return redirect()->back()->with("success_msg", updatedMessage("Category"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->categoryService->destory($id);

        return redirect()->route('categories')->with("success_msg", deletedMessage("Category"));
    }

    /**
     * Search the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $categories = $this->categoryService->search($request);

        return view('category.index', compact('categories'));
    }

    /**
     * Export the csv file from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function export()
    {
        return Excel::download(new CategoriesExport, 'category_data.csv');
    }

    /**
     * Delete all data from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function importFile()
    {
        return view('category.import');
    }

    /**
     * Import all data from the csv to storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function import()
    {
        Category::truncate();
        Excel::import(new CategoriesImport, request()->file('file'));

        return redirect()->route('categories')->with("success_msg", importMessage("CSV"));
    }
}

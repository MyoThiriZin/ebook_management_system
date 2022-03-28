<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Export\CategoriesExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\storeCategoryRequest;
use App\Http\Requests\updateCategoryRequest;
use App\Import\CategoriesImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('category.index', [
            'categories' => category::latest()->orderBy('created_at', 'desc')->paginate(10),
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
        category::create($request->validated());
        return redirect()->back()->with("success_msg",createdMessage("Category"));
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
        $category = category::find($id);
        $category->name = $request->name;
        $category->save();

        return redirect()->back()->with("success_msg", updatedMessage("Category"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = category::find($id);
        foreach($category->books as $book){
            $book->borrow()->delete(); 
            $book->delete(); 
        }
        $category->delete();
        return redirect()->route('categories')->with("success_msg", deletedMessage("Category"));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $categories = category::query()
            ->Where('id', 'LIKE', "%{$search}%")
            ->orWhere('name', 'LIKE', "%{$search}%")
            ->latest()->paginate(10);
        return view('category.index', compact('categories'));
    }

    public function export()
    {
        return Excel::download(new CategoriesExport, 'category_data.csv');
    }

    public function importFile()
    {
        Category::truncate();

        return view('category.import');
    }

    public function import()
    {
        Excel::import(new CategoriesImport, request()->file('file'));

        return redirect()->route('categories')->with("success_msg", importMessage("CSV"));
    }
}

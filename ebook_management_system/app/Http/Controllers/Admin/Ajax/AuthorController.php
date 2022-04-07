<?php

namespace App\Http\Controllers\Admin\Ajax;

use App\Author;
use Illuminate\Http\Request;
use App\Export\AuthorsExport;
use App\Import\AuthorsImport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use App\Contracts\Services\AuthorServiceInterface;

/**
 * This is Author Controller.
 * This will handle author CRUD processing.
 */
class AuthorController extends Controller
{
    /**
     * author service interface
     */
    private $authorServiceInterface;

    /**
     * Create a new controller instance.
     * @param AuthorServiceInterface $authorServiceInterface
     * @return void
     */
    public function __construct(AuthorServiceInterface $authorServiceInterface)
    {
        $this->authorServiceInterface = $authorServiceInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $authors = $this->authorServiceInterface->getauthors($request);

        return view('authors.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('authors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|max:255|string|email|unique:authors',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'error' => $validator->messages(),
            ]);
        } else {
            \Session::flash('success_msg', ('Author has been created.'));
            \Session::reflash();
            $authors = $this->authorServiceInterface->store($request);
            return response()->json($authors);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $authors = $this->authorServiceInterface->detailAuthor($id);
        return view('authors.detail', compact('authors'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $authors = $this->authorServiceInterface->editAuthor($id);
        return view('authors.edit', compact('authors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request, int  $id
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|max:255|string|email|unique:authors,email,' . $id,
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'error' => $validator->messages(),
            ]);
        } else {
            \Session::flash('success_msg', ('Author has been updated.'));
            \Session::reflash();
            $authors = $this->authorServiceInterface->updateInfo($request, $id);
            return response()->json($authors);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \Session::flash('success_msg', ('Author has been deleted.'));
        \Session::reflash();
        $authors = $this->authorServiceInterface->deleteById($id);
        return response()->json($authors);
    }

    /**
     * Search the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $search = $request->get('search');

        $authors = $this->authorServiceInterface->authorsSearch($search);

        return view('authors.index', compact('authors'));
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        Author::withTrashed()->find($id)->restore();

        return back()->with('success', 'Author Restore Successfully');
    }

    /**
     * Export the csv file from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function export()
    {
        return Excel::download(new AuthorsExport, 'author_data.csv');
    }

    /**
     * Delete all data from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function importFile()
    {

        return view('authors.import');
    }

    /**
     * Import all data from the csv to storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function import()
    {
        Author::truncate();
        Excel::import(new AuthorsImport, request()->file('file'));

        return redirect()->route('authors.index')->with("success_msg", importMessage("CSV"));
    }
}

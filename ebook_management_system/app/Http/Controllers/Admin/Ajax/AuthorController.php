<?php

namespace App\Http\Controllers\Admin\Ajax;


use Illuminate\Http\Request;
use App\Export\AuthorsExport;
use App\Import\AuthorsImport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use App\Contracts\Services\AuthorServiceInterface;

class AuthorController extends Controller
{
    private $authorServiceInterface;

    public function __construct(AuthorServiceInterface $authorServiceInterface)
    {
      $this->authorServiceInterface = $authorServiceInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = $this->authorServiceInterface->getauthors();
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
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'=>400,
                'error'=>$validator->messages(),
            ]);
        } else {
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
        ]);

        $authors = $this->authorServiceInterface->updateInfo($request, $id);

        if ($validator->fails()) {
            return response()->json([
                'status'=>400,
                'error'=>$validator->messages(),
            ]);
        } else {
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

        $authors =  $this->authorServiceInterface->authorsSearch($search);

        return view('authors.index', compact('authors'));
    }

    public function export()
        {
           return Excel::download(new AuthorsExport, 'author_data.csv');

        }

        public function importFile()
        {
           return view('authors.import');
        }

        public function import()
        {
             Excel::import(new AuthorsImport, request()->file('file'));

             return redirect()->route('authors.index')->with("success_msg", importMessage("CSV"));
        }
}

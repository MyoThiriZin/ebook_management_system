<?php

namespace App\Http\Controllers\Admin;

use App\Book;
use App\Author;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::with("category", "author")->latest()->get();

        return view('books.index', ['items' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::orderBy("name")->get()->pluck("name", "id");

        $categories = Category::orderBy("name")->get()->pluck("name", "id");

        return view('books.create')->with(['authors' => $authors, 'categories' => $categories]);
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
            'image' => 'required',
            'file' => 'required',
            'duration' => 'required',
            'description' => 'required',
            'author_id' => 'required',
            'category_id' => 'required',

        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        //Image
        $file = $request->file('image');
        $fileName = $file->getClientOriginalName();
        $file->move(public_path() . '/uploads/', $fileName);

        //pdf file
        $pdf_file = $request->file('file');
        $pdf_fileName = $pdf_file->getClientOriginalName();
        $pdf_file->move(public_path() . '/pdf_files/', $pdf_fileName);

        $data = $this->requestBook($request, $fileName, $pdf_fileName);

        Book::create($data); //create book

        return redirect()->route('books.index')->with("success_msg", createdMessage("Book"));
    }

    private function requestBook($request, $fileName ,$pdf_fileName)
    {
        return [
            'name' => $request->name,
            'image' => $fileName,
            // 'image'=>$request->image,
            'file' => $pdf_fileName,
            'author_id' => $request->author_id,
            'category_id' => $request->category_id,
            'duration' => $request->duration,
            'description' => $request->description,
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $authors = Author::orderBy("name")->get()->pluck("name", "id");

        $categories = Category::orderBy("name")->get()->pluck("name", "id");

        return view('books.edit')->with(['item' => $book, 'authors' => $authors, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'duration' => 'required',
            'description' => 'required',
            'author_id' => 'required',
            'category_id' => 'required',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $updateData = $this->requestUpdate($request);
        //dd($updateData['file']);
        if (isset($updateData['image']) && isset($updateData['file'])) {
            $data = Book::select('image')->where('id', $book->id)->first();
            $fileName = $data['image'];

            if (File::exists(public_path() . '/uploads/' . $fileName)) {
                File::delete(public_path() . '/uploads/' . $fileName);
            }

            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path() . '/uploads/', $fileName); //move path to $fileName
            $updateData['image'] = $fileName;

            $file_data = Book::select('file')->where('id', $book->id)->first();
            $pdf_fileName = $file_data['file'];

            if (File::exists(public_path() . '/pdf_files/' . $pdf_fileName)) {
                File::delete(public_path() . '/pdf_files/' . $pdf_fileName);
            }

            $file = $request->file('file');
            $pdf_fileName = $file->getClientOriginalName();
            $file->move(public_path() . '/pdf_files/', $pdf_fileName); //move path to $pdf_fileName

            $updateData['file'] = $pdf_fileName;
        }
        $book->update($updateData);

        return redirect()->route('books.index')->with("success_msg", updatedMessage("Book"));
    }

    private function requestUpdate($request)
    {
        $arr = [
            'name' => $request->name,
            'author_id' => $request->author_id,
            'category_id' => $request->category_id,
            'duration' => $request->duration,
            'description' => $request->description,
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];

        if (isset($request->image) && isset($request->file)) {
            $arr['image'] = $request->image;
            $arr['file'] = $request->file;
        }
        return $arr;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $data = Book::select('image')->where('id', $book->id)->first();
        $fileName = $data['image'];
        //$pdf_fileName = $data['file'];

        Book::where('id', $book->id)->delete();

        if (File::exists(public_path() . '/uploads/' . $fileName)) {
            File::delete(public_path() . '/uploads/' . $fileName);
        }

        //if (File::exists(public_path() . '/pdf_files/' . $pdf_fileName)) {
        //    File::delete(public_path() . '/pdf_files/' . $pdf_fileName);
        //}

        return redirect()->back()->with("success_msg", deletedMessage("Book"));
    }
}

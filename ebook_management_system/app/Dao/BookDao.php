<?php
namespace App\Dao;

use App\Book;
use App\Author;
use App\Category;
use App\Borrow;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use App\Contracts\Dao\BookDaoInterface;

/**
 * Data Access Object for Book
 */
class BookDao implements BookDaoInterface
{
    /**
     * model
     */
    private $model;

    /**
     * Class Constructor
     * @param Book
     * @return
     */
    public function __construct(Book $model)
    {
        $this->model = $model;
    }

    /**
     * To get book list
     * @return array list of books
     */
    public function index()
    {
        return $this->model->when($search = request('searchData'), function ($query) use ($search) {
                        $query->where('name', 'LIKE', '%' . $search . '%')
                        ->orWhere('duration', 'LIKE', '%' . $search . '%')
                        ->orWhere(function ($query) use ($search) {
                            $query->whereHas('author', function ($qry) use ($search) {
                                $qry->where('name', 'LIKE', '%' . $search . '%');
                            });
                        })
                        ->orWhere(function ($query) use ($search) {
                            $query->whereHas('category', function ($qry) use ($search) {
                                $qry->where('name', 'LIKE', '%' . $search . '%');
                            });
                        });
                        })->latest()->paginate(10);
    }

    /**
     * To get author list
     * @return array list of authors
     */
    public function getAuthor()
    {
        return Author::orderBy("name")->get()->pluck("name", "id");
    }

    /**
     * To get category list
     * @return array list of categories
     */
    public function getCategory()
    {
        return Category::orderBy("name")->get()->pluck("name", "id");
    }

    /**
     * To request book data
     * @return array list of book data
     */
    private function requestBook($request, $fileName ,$pdf_fileName)
    {
        return [
            'name' => $request->name,
            'image' => $fileName,
            'file' => $pdf_fileName,
            'author_id' => $request->author_id,
            'category_id' => $request->category_id,
            'duration' => $request->duration,
            'description' => $request->description,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }

    /**
     * To store book
     * @param Request $request request including inputs
     * @return Object created book object
     */
    public function store(Request $request)
    {
        $file = $request->file('image');
        $fileName = $file->getClientOriginalName();
        $file->move(public_path() . '/uploads/', $fileName);

        //pdf file
        $pdf_file = $request->file('file');
        $pdf_fileName = $pdf_file->getClientOriginalName();
        $pdf_file->move(public_path() . '/pdf_files/', $pdf_fileName);

        $data = $this->requestBook($request, $fileName, $pdf_fileName);

        return $this->model->create($data);
    }

    /**
     * To update book with values from request
     * @param Request $request request including inputs
     * @param string $book book
     * @return Object updated book object
     */
    public function update(Request $request, $book)
    {
        $updateData = $this->requestUpdate($request);

        if (isset($updateData['image'])) {
            $data = $this->model->select('image')->where('id', $book->id)->first();
            $fileName = $data['image'];

            if (File::exists(public_path() . '/uploads/' . $fileName)) {
                File::delete(public_path() . '/uploads/' . $fileName);
            }

            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path() . '/uploads/', $fileName); //move path to $fileName
            $updateData['image'] = $fileName;
        }

        if(isset($updateData['file'])){
            $file_data = $this->model->select('file')->where('id', $book->id)->first();
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
    }

    /**
     * To request to update book with values from request
     * @param Request $request request including inputs
     * @return array list of updated book
     */
    private function requestUpdate($request)
    {
        $arr = [
            'name' => $request->name,
            'author_id' => $request->author_id,
            'category_id' => $request->category_id,
            'duration' => $request->duration,
            'description' => $request->description,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];

        if (isset($request->image)) {
            $arr['image'] = $request->image;
        }

        if(isset($request->file)){
            $arr['file'] = $request->file;
        }

        return $arr;
    }

    /**
     * To delete book
     * @param integer $book book id
     * @return true
     */
    public function delete($book)
    {
        $data = $this->model->select('image','file')->where('id', $book->id)->first();
        $fileName = $data['image'];
        $pdf_fileName = $data['file'];

        $this->model->where('id', $book->id)->delete();
        
        Borrow::with('book')->where('book_id' , $book->id)->delete();

        if (File::exists(public_path() . '/uploads/' . $fileName)) {
            File::delete(public_path() . '/uploads/' . $fileName);
        }

        if (File::exists(public_path() . '/pdf_files/' . $pdf_fileName)) {
            File::delete(public_path() . '/pdf_files/' . $pdf_fileName);
        }

        return true;
    }

}

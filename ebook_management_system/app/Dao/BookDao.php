<?php
namespace App\Dao;

use App\Book;
use App\Author;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use App\Contracts\Dao\BookDaoInterface;

class BookDao implements BookDaoInterface
{
    private $model;

    public function __construct(Book $model)
    {
        $this->model = $model;
    }

    public function index(){

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
                    })->latest()->paginate(5);
    }

    public function getAuthor(){

        return Author::orderBy("name")->get()->pluck("name", "id");
    }

    public function getCategory(){

        return Category::orderBy("name")->get()->pluck("name", "id");
    }

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
    public function store(Request $request){

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

    public function update(Request $request, $book){
        $updateData = $this->requestUpdate($request);
        //dd($updateData['file']);
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

    public function delete($book){

        $data = $this->model->select('image','file')->where('id', $book->id)->first();
        $fileName = $data['image'];
        $pdf_fileName = $data['file'];

        $this->model->where('id', $book->id)->delete();

        if (File::exists(public_path() . '/uploads/' . $fileName)) {
            File::delete(public_path() . '/uploads/' . $fileName);
        }

        if (File::exists(public_path() . '/pdf_files/' . $pdf_fileName)) {
            File::delete(public_path() . '/pdf_files/' . $pdf_fileName);
        }
        
        return true;
    }

}

<?php

namespace App\Dao;

use App\Contracts\Dao\AuthorDaoInterface;
use App\Author;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AuthorDao implements AuthorDaoInterface {

    public function getauthors(Request $request){
      if($request->has('view_deleted')) {
        return Author::onlyTrashed()->paginate(10);
      } else {
        return Author::with('user')->paginate(10);
      }
    }

    public function store(Request $request){
      return  Author::create($request->all());
    }

    public function deleteById($id){
      $author = Author::findOrFail($id);
      $author->books()->delete();
      return $author->delete();
    }

    public function editAuthor($id){
      return  Author::findOrFail($id);
    }

  public function updateInfo(Request $request, $id){
    return Author::whereId($id)->update(
      [
        'name' => $request->name,
        'email' => $request->email,
        'description' => $request->description
    ]
    );
  }

  public function detailAuthor($id){
    return Author::with('user')->find($id);
  }

  public function authorsSearch($search){

    return Author::with('user')
    ->where('name', 'like', '%'.$search.'%')
    ->orWhere('email', 'like', '%'.$search.'%')
    ->orWhere('description', 'like', '%'.$search.'%')
    ->get();
  }

}

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
      return  Author::findOrFail($id)->delete();
    }

    public function editAuthor($id){
      return  Author::findOrFail($id);
    }

  public function updateInfo(Request $request, $id){
    return Author::whereId($id)->update(
      [
        'name' => $request->name,
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
    ->orWhere('description', 'like', '%'.$search.'%')
    ->get();
  }

}
<?php

namespace App\Contracts\Dao;

use Illuminate\Http\Request;

interface AuthorDaoInterface {
  public function getauthors(Request $request);

  public function store(Request $request);

  public function deleteById($id);

  public function editAuthor($id);

  public function updateInfo(Request $request, $id);

  public function detailAuthor($id);

  public function authorsSearch($search);

}
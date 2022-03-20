<?php

namespace App\Contracts\Services;

use Illuminate\Http\Request;

interface AuthorServiceInterface
{
  public function getauthors();

  public function store(Request $request);

  public function deleteById($id);

  public function editAuthor($id);

  public function updateInfo(Request $request, $id);

  public function detailAuthor($id);

  public function authorsSearch($search);
}
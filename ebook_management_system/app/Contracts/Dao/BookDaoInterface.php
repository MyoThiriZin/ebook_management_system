<?php
namespace App\Contracts\Dao;

use Illuminate\Http\Request;

interface BookDaoInterface
{
    public function index();

    public function getAuthor();

    public function getCategory();

    public function store(Request $request);

    public function update(Request $request, $book);

    public function delete($book);

}

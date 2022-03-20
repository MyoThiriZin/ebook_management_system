<?php
namespace App\Contracts\Services;

use Illuminate\Http\Request;

interface BookServiceInterface
{
    public function index();

    public function getAuthor();

    public function getCategory();

    public function store(Request $request);

    public function update(Request $request, $book);

    public function delete($book);

}

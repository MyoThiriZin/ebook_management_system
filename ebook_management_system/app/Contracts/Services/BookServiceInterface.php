<?php
namespace App\Contracts\Services;

use Illuminate\Http\Request;

interface BookServiceInterface
{
    /**
     * To get book list
     * @return array $boollist Book list
     */
    public function index();

    /**
     * To get author
     * @return array $author 
     */
    public function getAuthor();

    /**
     * To get category
     * @return array $author 
     */
    public function getCategory();

    /**
     * To save book 
     * 
     * @param Request $request request with inputs
     * @return Object $book save book
     */
    public function store(Request $request);

    /**
     * To update book by id 
     * 
     * @param Request $request request with inputs
     * @param string $book Book id
     * @return Object $book update book
     */
    public function update(Request $request, $book);

    /**
     * To delete book by id 
     * 
     * @param string $book Book id
     * @return Object $book delete book
     */
    public function delete($book);

}

<?php
namespace App\Services;

use App\Contracts\Dao\BookDaoInterface;
use App\Contracts\Services\BookServiceInterface;
use Illuminate\Http\Request;

class BookService implements BookServiceInterface
{
    private $bookDao;

    public function __construct(BookDaoInterface $bookDao)
    {
        $this->bookDao = $bookDao;
    }

    public function index()
    {
        return $this->bookDao->index();
    }

    public function getAuthor()
    {
        return $this->bookDao->getAuthor();
    }

    public function getCategory()
    {
        return $this->bookDao->getCategory();
    }

    public function store(Request $request)
    {
        return $this->bookDao->store($request);
    }

    public function update(Request $request, $book)
    {
        return $this->bookDao->update($request, $book);
    }

    public function delete($book)
    {
        return $this->bookDao->delete($book);
    }
}

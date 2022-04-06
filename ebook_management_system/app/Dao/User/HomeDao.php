<?php

namespace App\Dao\User;

use App\Contracts\Dao\User\HomeDaoInterface;
use App\Book;
use App\Author;
use App\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

/**
 * Data Access Object for Home
 */
class HomeDao implements HomeDaoInterface 
{
    /**
     * To get book list
     * 
     * @return array list of books
     */
    public function getbooks()
    {
      return DB::table('borrows')
      ->join('books', 'books.id', '=', 'borrows.book_id')
      ->join('authors', 'authors.id', '=', 'books.author_id')
      ->select(\DB::raw("count(borrows.book_id) as count, books.id, books.image, books.name"))
      ->groupBy('borrows.book_id')
      ->orderBy('count', 'desc')
      ->get()->take(6);
    }

    /**
     * To get author list
     * 
     * @return array list of authors
     */
    public function getauthors()
    {
      $authors = DB::table('borrows')
      ->join('books', 'books.id', '=', 'borrows.book_id')
      ->join('authors', 'authors.id', '=', 'books.author_id')
      ->select(\DB::raw("count(borrows.book_id) as count, authors.name"))
      ->groupBy('borrows.book_id')
      ->orderBy('count', 'desc')
      ->pluck('count','name')->take(5);

      $authornames = $authors->keys();

      return $authornames;
    }

    /**
     * To get category list
     * 
     * @return array list of categories
     */
    public function getcategories()
    {
      $categories = DB::table('borrows')
      ->join('books', 'books.id', '=', 'borrows.book_id')
      ->join('categories', 'categories.id', '=', 'books.category_id')
      ->select(\DB::raw("count(borrows.book_id) as count, categories.name"))
      ->groupBy('borrows.book_id')
      ->orderBy('count', 'desc')
      ->pluck('count','name')->take(5);

      $categorynames = $categories->keys();

      return $categorynames;
    }

}

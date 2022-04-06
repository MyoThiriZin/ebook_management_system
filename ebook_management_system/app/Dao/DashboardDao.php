<?php

namespace App\Dao;

use App\Contracts\Dao\DashboardDaoInterface;
use App\Charts\BookChart;
use App\Borrow;
use App\Book;
use App\Author;
use App\Category;

/**
 * Data Access Object for Dashboard
 */
class DashboardDao implements DashboardDaoInterface 
{
    /**
     * To get chart of user counts
     * @return array list of book labels and user counts
     */
    public function getchart() 
    {
      $books = Borrow::join('books', 'borrows.book_id', '=', 'books.id')
      ->groupBy('book_id')
      ->selectRaw('count(book_id) as count, books.name')
      ->pluck('count', 'name')
      ->sortDesc()
      ->take(10);

      $chart = new BookChart;
      $chart->labels($books->keys());
      $chart->dataset('User Counts', 'bar', $books->values())
            ->backgroundColor('#2d6cdf');
      
      return $chart;
    }

    /**
     * To get book list
     * @return array list of books
     */
    public function getbooks() 
    {
      return Book::get();
    }

    /**
     * To get author list
     * @return array list of authors
     */
    public function getauthors() 
    {
      return Author::get();
    }

    /**
     * To get category list
     * @return array list of categories
     */
    public function getcategories() 
    {
      return Category::get();
    }
}
<?php

namespace App\Dao;

use App\Contracts\Dao\DashboardDaoInterface;
use App\Charts\BookChart;
use App\Borrow;
use App\Book;
use App\Author;
use App\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardDao implements DashboardDaoInterface {

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

    public function getbooks() 
    {
      return Book::get();
    }

    public function getauthors() 
    {
      return Author::get();
    }

    public function getcategories() 
    {
      return Category::get();
    }
}
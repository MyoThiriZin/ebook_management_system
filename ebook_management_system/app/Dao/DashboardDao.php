<?php

namespace App\Dao;

use App\Contracts\Dao\DashboardDaoInterface;
use App\Charts\BookChart;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardDao implements DashboardDaoInterface {

    public function getchart() 
    {
      $books = DB::table('borrows')
      ->join('books', 'books.id', '=', 'borrows.book_id')
      ->select(\DB::raw("count(borrows.book_id) as count, books.name "))
      ->groupBy('borrows.book_id')
      ->orderBy('count', 'desc')
      ->pluck('count', 'name')->take(10);

      $chart = new BookChart;
      $chart->labels($books->keys());
      $chart->dataset('User Counts', 'bar', $books->values())
            ->backgroundColor('#2d6cdf');
      
      return $chart;
    }

    public function getbooks() 
    {
      $books = DB::table('books')->get();
      
      return $books;
    }

    public function getauthors() 
    {
      $authors = DB::table('authors')->get();
      
      return $authors;
    }

    public function getcategories() 
    {
      $categories = DB::table('categories')->get();
      
      return $categories;
    }
}
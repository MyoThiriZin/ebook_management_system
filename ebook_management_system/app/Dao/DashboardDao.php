<?php

namespace App\Dao;

use App\Contracts\Dao\DashboardDaoInterface;
use App\Charts\BookChart;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardDao implements DashboardDaoInterface {

    public function getchart() 
    {
      $data = DB::table('borrows')->get('book_id')->groupBy('book_id');

      $bookCount=[];
      foreach($data as $book => $values){
          $bookCount[]=count($values);
      }

      $books = DB::table('borrows')
      ->join('books', 'books.id', '=', 'borrows.book_id')
      ->pluck('borrows.book_id','name');

      $chart = new BookChart;
      $chart->labels($books->keys());
      $chart->dataset('Book Names', 'bar', $bookCount)
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
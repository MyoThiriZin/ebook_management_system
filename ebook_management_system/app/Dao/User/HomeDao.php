<?php

namespace App\Dao\User;

use App\Contracts\Dao\User\HomeDaoInterface;
use App\Borrow;
use Illuminate\Support\Facades\DB;

/**
 * Data Access Object for Home
 */
class HomeDao implements HomeDaoInterface
{

    /**
     * To get popular book 
     * 
     * return Object $book Book object
     */
    public function getbooks()
    {
        return Borrow::join('books', 'books.id', '=', 'borrows.book_id')
            ->join('authors', 'authors.id', '=', 'books.author_id')
            ->select(\DB::raw("count(borrows.book_id) as count, books.id, books.image, books.name"))
            ->groupBy('borrows.book_id')
            ->orderBy('count', 'desc')
            ->get()->take(6);
    }

    /**
     * To get top author 
     * 
     * return Object $authornames Author object
     */
    public function getauthors()
    {
        $authors = Borrow::join('books', 'books.id', '=', 'borrows.book_id')
            ->join('authors', 'authors.id', '=', 'books.author_id')
            ->select(\DB::raw("count(borrows.book_id) as count, authors.name"))
            ->groupBy('borrows.book_id')
            ->orderBy('count', 'desc')
            ->pluck('count', 'name')->take(5);

        $authornames = $authors->keys();

        return $authornames;
    }

    /**
     * To get top category 
     * 
     * return Object $categorynames Category object
     */
    public function getcategories()
    {
        $categories = Borrow::join('books', 'books.id', '=', 'borrows.book_id')
            ->join('categories', 'categories.id', '=', 'books.category_id')
            ->select(\DB::raw("count(borrows.book_id) as count, categories.name"))
            ->groupBy('borrows.book_id')
            ->orderBy('count', 'desc')
            ->pluck('count', 'name')->take(5);

        $categorynames = $categories->keys();

        return $categorynames;
    }
}

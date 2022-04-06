<?php

namespace App\Contracts\Services\User;

use Illuminate\Http\Request;

/**
 * Interface for book service.
 */
interface HomeServiceInterface
{
  /**
   * To get book list
   * 
   * @return array list of books
   */
  public function getbooks();

  /**
   * To get author list
   * 
   * @return array list of authors
   */
  public function getauthors();

  /**
   * To get category list
   * 
   * @return array list of categories
   */
  public function getcategories();

}
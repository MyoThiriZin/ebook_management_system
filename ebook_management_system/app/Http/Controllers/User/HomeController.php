<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Contracts\Services\User\HomeServiceInterface;

class HomeController extends Controller
{
    private $homeServiceInterface;

    public function __construct(HomeServiceInterface $homeServiceInterface)
    {
        $this->homeServiceInterface = $homeServiceInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $books = $this->homeServiceInterface->getbooks();
      $authornames = $this->homeServiceInterface->getauthors();
      $categorynames = $this->homeServiceInterface->getcategories();

      return view('users.home.index', compact('books', 'authornames', 'categorynames'));
    }

}

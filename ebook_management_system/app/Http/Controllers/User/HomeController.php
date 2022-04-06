<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Contracts\Services\User\HomeServiceInterface;

/**
 * This is Home Controller.
 * This will handle home data retrieve processing.
 */
class HomeController extends Controller
{
    /**
     * home Service Interface
     */
    private $homeServiceInterface;

    /**
     * Create a new controller instance.
     * @param HomeServiceInterface $homeServiceInterface
     * @return void
     */
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

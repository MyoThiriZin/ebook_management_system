<?php

namespace App\Http\Controllers\Admin;

use App\Book;
use App\Borrow;
use App\Charts\BookChart;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Contracts\Services\DashboardServiceInterface;

class DashboardController extends Controller
{
    private $dashboardServiceInterface;

    public function __construct(DashboardServiceInterface $dashboardServiceInterface)
    {
      $this->dashboardServiceInterface = $dashboardServiceInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chart = $this->dashboardServiceInterface->getchart();
        $books = $this->dashboardServiceInterface->getbooks();
        $authors = $this->dashboardServiceInterface->getauthors();
        $categories = $this->dashboardServiceInterface->getcategories();

        return view('dashboard.index', compact('chart', 'books', 'authors', 'categories'));
    }
}

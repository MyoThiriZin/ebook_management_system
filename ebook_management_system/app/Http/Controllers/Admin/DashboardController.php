<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Contracts\Services\DashboardServiceInterface;

/**
 * This is Dashboard Controller.
 * This will handle dashboard chart and count show processing.
 */
class DashboardController extends Controller
{
    /**
     * dashboard service interface
     */
    private $dashboardServiceInterface;

    /**
     * Create a new controller instance.
     * @param DashboardServiceInterface $dashboardServiceInterface
     * @return void
     */
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

<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use ConsoleTVs\Charts\Registrar as Charts;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Dao Registration
        $this->app->bind('App\Contracts\Dao\Auth\AuthDaoInterface', 'App\Dao\Auth\AuthDao');
        $this->app->bind('App\Contracts\Dao\Auth\ForgotPasswordDaoInterface', 'App\Dao\Auth\ForgotPasswordDao');
        $this->app->bind('App\Contracts\Dao\AuthorDaoInterface', 'App\Dao\AuthorDao');
        $this->app->bind('App\Contracts\Dao\BookDaoInterface', 'App\Dao\BookDao');
        $this->app->bind('App\Contracts\Dao\BorrowDaoInterface', 'App\Dao\BorrowDao');
        $this->app->bind('App\Contracts\Dao\DashboardDaoInterface', 'App\Dao\DashboardDao');
        $this->app->bind('App\Contracts\Dao\UserDaoInterface', 'App\Dao\UserDao');
        $this->app->bind('App\Contracts\Dao\ContactUsDaoInterface', 'App\Dao\ContactUsDao');
        $this->app->bind('App\Contracts\Dao\CategoryDaoInterface', 'App\Dao\CategoryDao');

        $this->app->bind('App\Contracts\Dao\User\HomeDaoInterface', 'App\Dao\User\HomeDao');
        $this->app->bind('App\Contracts\Dao\User\BookDaoInterface', 'App\Dao\User\BookDao');
        $this->app->bind('App\Contracts\Dao\User\BorrowDaoInterface', 'App\Dao\User\BorrowDao');
        $this->app->bind('App\Contracts\Dao\User\BorrowDaoInterface', 'App\Dao\User\BorrowDao');
        $this->app->bind('App\Contracts\Dao\User\ContactDaoInterface', 'App\Dao\User\ContactDao');

        // Business logic registration
        $this->app->bind('App\Contracts\Services\Auth\AuthServiceInterface', 'App\Services\Auth\AuthService');
        $this->app->bind('App\Contracts\Services\Auth\ForgotPasswordServiceInterface', 'App\Services\Auth\ForgotPasswordService');
        $this->app->bind('App\Contracts\Services\AuthorServiceInterface', 'App\Services\AuthorService');
        $this->app->bind('App\Contracts\Services\DashboardServiceInterface', 'App\Services\DashboardService');
        $this->app->bind('App\Contracts\Services\BookServiceInterface', 'App\Services\BookService');
        $this->app->bind('App\Contracts\Services\UserServiceInterface', 'App\Services\UserService');
        $this->app->bind('App\Contracts\Services\ContactUsServiceInterface', 'App\Services\ContactUsService');
        $this->app->bind('App\Contracts\Services\BorrowServiceInterface', 'App\Services\BorrowService');
        $this->app->bind('App\Contracts\Services\UserServiceInterface', 'App\Services\UserService');
        $this->app->bind('App\Contracts\Services\ContactUsServiceInterface', 'App\Services\ContactUsService');
        $this->app->bind('App\Contracts\Services\CategoryServiceInterface', 'App\Services\CategoryService');

        $this->app->bind('App\Contracts\Services\User\HomeServiceInterface', 'App\Services\User\HomeService');
        $this->app->bind('App\Contracts\Services\User\BookServiceInterface', 'App\Services\User\BookService');
        $this->app->bind('App\Contracts\Services\User\BorrowServiceInterface', 'App\Services\User\BorrowService');
        $this->app->bind('App\Contracts\Services\User\ContactServiceInterface', 'App\Services\User\ContactService');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Paginator::useBootstrap();
    }
}

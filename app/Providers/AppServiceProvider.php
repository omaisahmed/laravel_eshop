<?php

namespace App\Providers;

use DB;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        View::composer('*', function ($view) {
            $cats = Category::where('status', '1')->get();
            $prods = Products::where('status', '1')->first();
            $view->with('cats', $cats);
            $view->with('prods',$prods);
        });
    }
}

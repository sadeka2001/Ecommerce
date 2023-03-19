<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\ServiceProvider;
use View;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {

/*        $categories=Category::all();
       $view->with('categories', $categories);
      $categories=Category::all();
        View::share('categories', $categories);
       view::share('categories',$categories=Category::all());*/
        Schema::defaultStringLength(191);
    }
}

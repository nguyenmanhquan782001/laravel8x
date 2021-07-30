<?php

namespace App\Providers;

use App\Models\Backend\CategoryModel;
use App\Models\Backend\ProductModel;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */



    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['frontend.partials.header', 'frontend.partials2.header'], function ($view) {
            $productHeader = ProductModel::orderByDesc("id")->limit(5)->get();
            $view->with("productHeader", $productHeader);
        });
        View::composer(['frontend.partials2.sidebar' , ], function ($view) {
            $categories = CategoryModel::where('status' , 1)->get();
            $categories->load('countProduct') ;
            $view->with("categories" ,$categories);
        });
    }
}

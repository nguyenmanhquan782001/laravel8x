<?php

namespace App\Providers;

use App\Http\Controllers\Frontend\CartController;
use App\Models\Backend\CategoryModel;
use App\Models\Backend\ProductModel;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('remove', function (User  $user , CategoryModel  $categoryModel){
            return $categoryModel->status == 2 ;
        } );

        //
    }
}

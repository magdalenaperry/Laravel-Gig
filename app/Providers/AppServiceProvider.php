<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
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
        // allowing mass assignment and do not need to add a fillable in Listing.php to create a listing.
        Model::unguard();
        // find documentation to change styling for pagination
        // Paginator::useBootstrapSOMETHING
    }
}

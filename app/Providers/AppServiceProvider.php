<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Html\HtmlBuilder;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {


    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
//        Builder::useVite();
        Paginator::useBootstrapFive();
        Model::unguard();
        Model::preventLazyLoading(!app()->environment('production'));
    }
}

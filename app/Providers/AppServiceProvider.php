<?php

namespace App\Providers;

use App\Models\WorkingHour;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
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

        Paginator::useBootstrapFive();
        Model::unguard();
        Model::preventLazyLoading(!app()->environment('production'));

        // Check if the working_hours table exists
        if (Schema::hasTable('working_hours')) {
            // Fetch working days from cache or database
            $workingDays = Cache::remember('working_days', 60 * 60 * 24, function () {
                return WorkingHour::all();
            });

            // Share working_days with all views
            View::share('working_days', $workingDays);
        }

        Gate::before(function ($user, $ability) {
            return $user->is_admin ? true : null;
        });
    }


}

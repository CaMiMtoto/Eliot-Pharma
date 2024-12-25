<?php

use App\Constants\AppPermission;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WorkingHourController;
use App\Livewire\ProductDetail;
use App\Livewire\ProductList;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'welcome'])->name('welcome');
Route::get('/products', ProductList::class)->name('products');
Route::get('/products/{product}/details', ProductDetail::class)->name('products.details');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        Route::group(['as' => 'categories.', 'middleware' => ['can:'.AppPermission::MANAGE_CATEGORIES]], function () {
            Route::get('/categories', [CategoryController::class, 'index'])->name('index');
            Route::post('/categories', [CategoryController::class, 'store'])->name('store');
            Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('show');
            Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('destroy');
        });
        Route::group([ 'as' => 'products.', 'middleware' => ['can:'.AppPermission::MANAGE_PRODUCTS]], function () {
            Route::get('/products', [ProductController::class, 'index'])->name('index');
            Route::post('/products', [ProductController::class, 'store'])->name('store');
            Route::get('/products/{product}', [ProductController::class, 'show'])->name('show');
            Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('destroy');
            Route::put('/products/{product}/toggle-featured', [ProductController::class, 'toggleFeatured'])->name('toggle-featured');
        });

        Route::group([ 'as' => 'working-hours.', 'middleware' => ['can:'.AppPermission::MANAGE_WORKING_HOURS]], function () {
            Route::get('/working-hours', [WorkingHourController::class, 'index'])->name('index');
            Route::post('/working-hours', [WorkingHourController::class, 'store'])->name('store');
            Route::get('/working-hours/{working_hour}', [WorkingHourController::class, 'show'])->name('show');
            Route::delete('/working-hours/{working_hour}', [WorkingHourController::class, 'destroy'])->name('destroy');
        });


        Route::group(["prefix" => "system", "as" => "system."], function () {

            Route::group([ 'as' => 'roles.', 'middleware' => ['can:'.AppPermission::MANAGE_ROLES]], function () {
                Route::get('/roles', [App\Http\Controllers\RolesController::class, 'index'])->name('index');
                Route::post('/roles', [App\Http\Controllers\RolesController::class, 'store'])->name('store');
                Route::get('/roles/{role}', [App\Http\Controllers\RolesController::class, 'show'])->name('show');
                Route::delete('/roles/{role}', [App\Http\Controllers\RolesController::class, 'destroy'])->name('destroy');
            });

            Route::group([ 'as' => 'users.', 'middleware' => ['can:'.AppPermission::MANAGE_USERS]], function () {
                Route::get('/users', [App\Http\Controllers\UsersController::class, 'index'])->name('index');
                Route::post('/users', [App\Http\Controllers\UsersController::class, 'store'])->name('store');
                Route::post('/users/{user}/toggle-activate', [App\Http\Controllers\UsersController::class, 'toggleActive'])->name('active-toggle');
                Route::delete('/users/{user}', [App\Http\Controllers\UsersController::class, 'destroy'])->name('destroy');
                Route::get('/users/{user}', [App\Http\Controllers\UsersController::class, 'show'])->name('show');
            });


            Route::get('/permissions', [App\Http\Controllers\PermissionsController::class, 'index'])->name('permissions.index')
                ->middleware('can:'.AppPermission::MANAGE_PERMISSIONS);

        });

    });
});


Auth::routes();

/*Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/users', [UsersController::class, 'index'])->name('users.index');
Route::get('/users/create', [UsersController::class, 'create'])->name('users.create');
Route::post('/users', [UsersController::class, 'store'])->name('users.store');
Route::get('/users/{user}/edit', [UsersController::class, 'edit'])->name('users.edit');
Route::patch('/users/{user}', [UsersController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [UsersController::class, 'destroy'])->name('users.destroy');*/


<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware(['auth', 'verified'])->group(function () {
//    home page
    Route::get('/', [PostController::class, 'index'])->name('dashboard');

//    Movies
    Route::prefix('/movie')->controller(PostController::class)->group(function () {
        Route::get('/{movie}', 'show')->name('movie');
    });

});

require __DIR__.'/auth.php';
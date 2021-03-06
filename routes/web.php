<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::name('general.')->group(function () {
    Route::get('/', [App\Http\Controllers\General\HomeController::class, 'index'])->name('home');
    Route::get('/detail', [App\Http\Controllers\General\DetailController::class, 'index'])->name('detail');
});



//All authenticated routes
Route::middleware('auth')->group(function () {
    Route::prefix('admin/')->name('admin.')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');

        //citizen crud routes
        Route::resource('citizens', App\Http\Controllers\Admin\CitizenController::class)->except(['create', 'show']);
        Route::resource('cities', App\Http\Controllers\Admin\CityController::class)->except(['create', 'show']);
        Route::resource('vaccination_centers', App\Http\Controllers\Admin\VaccinationCenterController::class)->except(['create', 'show']);
        Route::resource('paramedic_staff', App\Http\Controllers\Admin\ParamedicStaffController::class)->except(['create', 'show']);
    });
});

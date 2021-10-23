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

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::name('general.')->group(function () {
    Route::get('/', [App\Http\Controllers\General\HomeController::class, 'index'])->name('home');
    Route::get('/detail', [App\Http\Controllers\General\DetailController::class, 'index'])->name('detail');
});



//All authenticated routes
Route::middleware('auth')->group(function () {
    // Admin Routes
    Route::prefix('admin/')->name('admin.')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');

        //citizen crud routes
        Route::resource('citizens', App\Http\Controllers\Admin\CitizenController::class)->except(['create', 'show']);
        Route::resource('cities', App\Http\Controllers\Admin\CityController::class)->except(['create', 'show']);
        Route::resource('vaccination_centers', App\Http\Controllers\Admin\VaccinationCenterController::class)->except(['create', 'show']);
        Route::resource('paramedic_staff', App\Http\Controllers\Admin\ParamedicStaffController::class)->except(['create', 'show']);
        Route::get('vaccination_phases', [App\Http\Controllers\Admin\VaccinationPhaseController::class, 'index'])->name('vaccination_phases.index');
        Route::patch("vaccination_phases/{vaccination_phase}", [App\Http\Controllers\Admin\VaccinationPhaseController::class, 'update'])->name('vaccination_phases.update');
    });
    Route::prefix('citizen/')->name('citizen.')->group(function () {
        Route::get('/', [App\Http\Controllers\Citizen\HomeController::class, 'index'])->name('home');
        Route::post('/', App\Http\Controllers\Citizen\VaccinationRegistration::class)->name('vaccine_registration');
    });
    Route::prefix('vaccination-center/')->name('vaccination_center.')->group(function () {
        Route::get('/', [App\Http\Controllers\VaccinationCenter\HomeController::class, 'index'])->name('home');
    });
    Route::prefix('paramedic/')->name('paramedic.')->group(function () {
        Route::get('/', [App\Http\Controllers\Paramedic\HomeController::class, 'index'])->name('home');
    });
});

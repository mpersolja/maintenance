<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\ServiceReportController;
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

Route::get('/', function () {
    return redirect()->route('login');
});

Route::group([
  'middleware' => 'auth'
], function() {

  Route::get(
    '/dashboard', [DashboardController::class, 'index']
  )->name('dashboard');

  Route::resource('client', ClientController::class);

  Route::group([
    'prefix' => 'location/',
    'as'     => 'location.'
  ], function () {

    Route::get(
      '{client}/create', [LocationController::class, 'create']
    )->name('create');

    Route::post(
      '/', [LocationController::class, 'store']
    )->name('store');

    Route::delete(
      '/{location}', [LocationController::class, 'destroy']
    )->name('destroy');

    Route::get(
      '{location}/edit', [LocationController::class, 'edit']
    )->name('edit');

    Route::put(
      '/{location}', [LocationController::class, 'update']
    )->name('update');

  });

  Route::group([
    'prefix' => 'machine/',
    'as'     => 'machine.'
  ], function () {

    Route::get(
      '{location}/create', [MachineController::class, 'create']
    )->name('create');

    Route::post(
      '/', [MachineController::class, 'store']
    )->name('store');

    Route::get(
      '/{machine}/edit', [MachineController::class, 'edit']
    )->name('edit');

    Route::get(
      '{machine}/show', [MachineController::class, 'show']
    )->name('show');

    Route::put(
      '{machine}/update', [MachineController::class, 'update']
    )->name('update');
  });

  Route::group([
    'prefix' => 'report/',
    'as'     => 'report.'
  ], function() {

    Route::post(
      '/', [ServiceReportController::class, 'store']
    )->name('store');

    Route::get(
      '{machine}/create', [ServiceReportController::class, 'create']
    )->name('create');
  });

});

require __DIR__.'/auth.php';

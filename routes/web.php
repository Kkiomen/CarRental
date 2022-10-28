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

Route::get('/', [\App\Http\Controllers\MainController::class, 'index'])->name('index');

Route::get('/auto/{car_id}', [\App\Http\Controllers\ReservationController::class, 'index'])->name('reservation_index');
Route::get('/reservation/book/{car_id}', [\App\Http\Controllers\ReservationController::class, 'book'])->name('reservation_book');
Route::post('/reservation/book/store/{car_id}', [\App\Http\Controllers\ReservationController::class, 'store'])->name('reservation_book_store');
Route::post('/reservation/book/store/{car_id}', [\App\Http\Controllers\ReservationController::class, 'store'])->name('reservation_book_store');
Route::get('/reservation/book/confirmation/{reservation}', [\App\Http\Controllers\ReservationController::class, 'confirmation'])->name('reservation_book_confirmation');

Route::group(['middleware' => 'auth','prefix' => 'dashboard'], function () {
    $allowedRoute =  ['index', 'create', 'store', 'edit', 'update', 'destroy'];

    Route::resource('auto-brand', \App\Http\Controllers\CarBrandController::class, [
        'only' => $allowedRoute
    ]);

    Route::resource('auto-model', \App\Http\Controllers\CarModelController::class, [
        'only' => $allowedRoute
    ]);

    Route::get('/reservation/list', [\App\Http\Controllers\ReservationController::class, 'list'])->name('reservation_list');
});




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

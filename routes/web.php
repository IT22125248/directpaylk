<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('hotels');
});

use App\Http\Controllers\HotelController;

Route::get('/hotels', [HotelController::class, 'index'])->name('hotels.index');
Route::get('/hotels/create', [HotelController::class, 'create'])->name('hotels.create');
Route::post('/hotels', [HotelController::class, 'store'])->name('hotels.store');


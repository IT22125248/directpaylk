<?php

use Illuminate\Support\Facades\Route;

Route::get('/home', function () {
    return view('welcome');
});


// title page for highlife
Route::get('/', function () {
    return view('hotels');
});


// Hotel create and view routes

use App\Http\Controllers\HotelController;

Route::get('/hotels', [HotelController::class, 'index'])->name('hotels.index');
Route::get('/hotels/create', [HotelController::class, 'create'])->name('hotels.create');
Route::post('/hotels', [HotelController::class, 'store'])->name('hotels.store');

//admin panal routes 

use App\Http\Controllers\AdminController;
//use App\Http\Controllers\UserController;
//use App\Http\Controllers\BookingController;

Route::get('/admins', [AdminController::class, 'dashboard'])->name('admins.dashboard');
//Route::resource('/admin/users', UserController::class);
//Route::resource('/admin/bookings', BookingController::class);
//Route::get('/logout', [AdminController::class, 'logout'])->name('logout');


Route::get('/admins/hotels', [HotelController::class, 'hotellist'])->name('admins.hotellist');


Route::get('/hotels/{hotel}/edit', [HotelController::class, 'edit'])->name('admins.edit');
Route::put('/admins/hotels/{hotel}', [HotelController::class, 'update'])->name('admins.update');
Route::delete('/admins/hotels/{hotel}', [HotelController::class, 'destroy'])->name('admins.destroy');
Route::get('restore/{hotel}',[HotelController::class, 'restore']);

Route::get('/dbconn', function(){
    return view('dbconn');
});
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\DustbinController;
use App\Http\Controllers\AssigneDustbinController;

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
Auth::routes(['register' => false]);
Route::get('register', function () {
    return redirect('login');
});
Route::get('/', function () {
    return redirect('login');
});

Auth::routes();


Route::middleware([\App\Http\Middleware\AdminDriver::class])->group(function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('dustbin', DustbinController::class);
    Route::resource('assigne-dustbin', AssigneDustbinController::class);
    Route::delete('delete-user-dustbin/{dustbin}/{user_id}', [App\Http\Controllers\AssigneDustbinController::class, 'deleteUserDustbin'])->name('delete.user.dustbin');
});
Route::resource('driver', DriverController::class);

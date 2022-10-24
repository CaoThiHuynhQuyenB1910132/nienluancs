<?php

use App\Http\Controllers\Admin\RoomTypeController;
use App\Http\Controllers\Admin\RoomController;
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
    return view('admin.index');
});

Route::get('/admin', function () {
    return view('admin.index');
});

// Route::prefix('/roomtype')->group(function() {
//     Route::get('/create',[RoomTypeController::class, 'create']);
//     Route::post('/store',[RoomTypeController::class, 'store']);
//     Route::get('/', [RoomTypeController::class, 'index']);
//     // Route::resource('roomtype', [\App\Http\Controllers\Admin\ProfileController::class]);
// });

// Route::prefix('roomtype')->controller(RoomTypeController::class)->name('roomtype.')->group(function(){
//     Route::get('/', 'index')->name('index');
//     Route::post('/', 'store')->name('store');
//     Route::get('/create', 'create')->name('create');
// });

// roomtype routes
Route::resource('roomtype',RoomTypeController::class);
Route::get('roomtype/{id}/delete',[RoomTypeController::class,'destroy']);
Route::resource('roomtype',RoomTypeController::class);

// room routes
Route::resource('room',RoomController::class);
Route::get('room/{id}/delete',[RoomController::class,'destroy']);
Route::resource('room',RoomController::class);

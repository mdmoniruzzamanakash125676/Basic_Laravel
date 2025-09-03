<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




Route::get('/',[HomeController::class,'home']);

Route::get('/home',[AdminController::class,'index'])->name('home');
Route::get('/room_details/{id}',[HomeController::class,'room_details']);

//room create and add
Route::get('/create_room',[AdminController::class,'create_room']);
Route::post('/add_room',[AdminController::class,'add_room']);
Route::get('/view_room',[AdminController::class,'view_room']);
Route::get('/room_delete/{id}',[AdminController::class,'room_delete']);
Route::get('/room_edit/{id}',[AdminController::class,'room_edit']);
Route::post('/update_room/{id}',[AdminController::class,'update_room']);
Route::post('/room_details/{id}',[AdminController::class,'room_details']);

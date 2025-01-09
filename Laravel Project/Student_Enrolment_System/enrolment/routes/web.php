<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AddstudentsController;
use App\Http\Controllers\AllstudentsController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TutionController;
use App\Http\Controllers\CseController;
use App\Http\Controllers\MeController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\CivilController;
use App\Http\Controllers\MmeController;
use App\Http\Controllers\EeeController;

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

Route::get('/', function () {
    return view('student_login');
});
Route::get('/backend', function () {
    return view('admin.admin_login');
});
Route::post('/adminlogin', [AdminController::class,'login_dashboard']);
Route::get('/admin_dashboard', [AdminController::class,'admin_dashboard']);

//__logout__
Route::get('/logout', [AdminController::class,'logout']);

//__viewprofile__
Route::get('/viewprofile', [AdminController::class,'viewprofile']);
//__setting__
Route::get('/setting', [AdminController::class,'setting']);

//__addstudent__
Route::get('/addstudent', [AddstudentsController::class, 'addstudent']);
Route::post('/savestudent', [AddstudentsController::class, 'savestudent']);
//__allstudent__
Route::get('/allstudent', [AllstudentsController::class,'allstudent']);
//__allteacher__
Route::get('/allteacher', [TeacherController::class,'allteacher']);
//__tutionfee__
Route::get('/tutionfee', [TutionController::class,'tutionfee']);
//__CSE__
Route::get('/cse', [CseController::class,'cse']);
//__ME__
Route::get('/me', [MeController::class,'me']);
//__EEE__
Route::get('/eee', [EeeController::class,'eee']);
//__Civil__
Route::get('/civil', [CivilController::class,'civil']);
//__Food__
Route::get('/food', [FoodController::class,'food']);
//__MME__
Route::get('/mme', [MmeController::class,'mme']);




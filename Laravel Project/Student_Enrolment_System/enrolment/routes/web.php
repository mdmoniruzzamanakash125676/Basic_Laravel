<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AddstudentsController;
use App\Http\Controllers\AllstudentsController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
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
//__Admin Login Page__
Route::post('/adminlogin', [AdminController::class,'login_dashboard']);
Route::get('/admin_dashboard', [AdminController::class,'admin_dashboard']);

//__Student Login Page__
Route::post('/studentlogin', [StudentController::class,'student_login']);
Route::get('/student_dashboard', [StudentController::class,'student_dashboard']);
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
//__deletestudent__
Route::get('/student_delete/{student_id}', [AllstudentsController::class,'studentdelete']);
//__viewstudent__
Route::get('/student_view/{student_id}', [AllstudentsController::class,'studentview']);
////__editstudent__
Route::get('/student_edit/{student_id}', [AllstudentsController::class,'studentedit']);
////__updatestudent__
Route::post('/student_update/{student_id}', [AllstudentsController::class,'studentupdate']);

//__allteacher__
Route::get('/allteacher', [TeacherController::class,'allteacher']);
//__addteacher__
Route::get('/addteacher', [TeacherController::class,'addteacher']);
Route::post('/saveteacher', [TeacherController::class, 'saveteacher']);

//__tutionfee__
Route::get('/tutionfee', [TutionController::class,'tutionfee']);
//__CSE__
//__viewcse__
Route::get('/cse_view/{student_id}', [CseController::class,'studentview']);

Route::get('/cse', [CseController::class,'cse']);

//__deletecse__
Route::get('/cse_delete/{student_id}', [CseController::class,'csedelete']);

//__ME__
Route::get('/me', [MeController::class,'me']);

//__viewme__
Route::get('/me_view/{student_id}', [MeController::class,'studentview']);


//__deleteme__
Route::get('/me_delete/{student_id}', [MeController::class,'medelete']);
//__EEE__
Route::get('/eee', [EeeController::class,'eee']);
//__deleteeee__
Route::get('/eee_delete/{student_id}', [EEEController::class,'eeedelete']);

//__vieweee__
Route::get('/eee_view/{student_id}', [EeeController::class,'studentview']);

//__Civil__
Route::get('/civil', [CivilController::class,'civil']);

//__viewcivil__
Route::get('/civil_view/{student_id}', [CivilController::class,'studentview']);

//__deletecivil__
Route::get('/civil_delete/{student_id}', [CivilController::class,'civildelete']);
//__Food__
Route::get('/food', [FoodController::class,'food']);
//__viewfood__
Route::get('/food_view/{student_id}', [FoodController::class,'studentview']);

//__deletefood__
Route::get('/food_delete/{student_id}', [FoodController::class,'fooddelete']);
//__MME__
Route::get('/mme', [MmeController::class,'mme']);
//__viewmme__
Route::get('/mme_view/{student_id}', [MmeController::class,'studentview']);

//__deletemme__
Route::get('/mme_delete/{student_id}', [MmeController::class,'mmedelete']);




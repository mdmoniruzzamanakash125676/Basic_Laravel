<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\StudentController;

Route::get('/', function () {
 
    return view('welcome');
});

/*
Route::get('/country', function () {
 
    return view('country');   //middleware
})->middleware('country');

*/



////controller
Route::get('/home',[HomeController::class,'Home']);
Route::get('/about',[HomeController::class,'About']);
Route::get('/contact',[HomeController::class,'Contact']);
Route::get('/country',[HomeController::class,'Country'])->middleware('country');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


//__class crud routes__//
Route::get('/class',[App\Http\Controllers\Admin\ClassController::class,'index'])->name('class.index');
Route::get('/create/class',[App\Http\Controllers\Admin\ClassController::class,'create'])->name('create.class');
Route::post('/store/class',[App\Http\Controllers\Admin\ClassController::class,'store'])->name('store.class');
Route::get('/delete/class/{id}',[App\Http\Controllers\Admin\ClassController::class,'delete'])->name('class.delete');
Route::get('/edit/class/{id}',[App\Http\Controllers\Admin\ClassController::class,'edit'])->name('class.edit');
Route::post('/update/class/{id}',[App\Http\Controllers\Admin\ClassController::class,'update'])->name('class.update');

 //__students crud routes__//

 Route::resource('students',StudentController::class);



Route::post('/store/contact',[HomeController::class,'store'])->name('store.contact');

Route::get('/user/details/{id}',[HomeController::class,'details'])->name('user.details');



Route::get('/test',function(Request $request){

            $logfile=file(storage_path().'/logs/contact.log');
            $collection=[];
            foreach($logfile as $line_number=>$line){
                $collection[]=array('line'=>$line_number , 'content'=>htmlspecialchars($line));  

            }

            dd($collection);

});


Route::get('/laravel', function () {
  return view('laravel');
})->middleware('auth');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

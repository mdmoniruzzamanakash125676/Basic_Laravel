<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\CategoryController;

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

//__category crud routes__//
Route::get('/category/index',[CategoryController::class,'index'])->name('category.index');
Route::get('/category/create',[CategoryController::class,'create'])->name('category.create');
Route::post('/category/store',[CategoryController::class,'store'])->name('category.store');
Route::get('/category/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
Route::post('/category/update/{id}',[CategoryController::class,'update'])->name('category.update');
Route::get('/category/delete/{id}',[CategoryController::class,'destroy'])->name('category.delete');




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
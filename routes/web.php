<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatController;
use App\Http\Controllers\PigController;
use App\Http\Controllers\DogController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\MobileController;
use App\Http\Controllers\LoveController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('index');
})->name('route.index');

Route::get('/apple_f1', function () {
    return view('f1');
})->name('route.f1');

Route::get('apple/f2', function () {
    return view('f2');
})->name('route.f2');

Route::get('apple/f2/f3', function () {
    return view('f3');
})->name('route.f3');

Route::get('/hello', [CatController::class, 'hello'])->name('route.hello');

// pig Resource Controllers
Route::resource('pigs', PigController::class);

// dog Resource Controllers
Route::resource('dogs', DogController::class);

// layouts & child
Route::get('/child', function () {
    return view('child');
});

// student Resource Controllers
Route::resource('students', StudentController::class);
// mobile Resource Controllers
Route::resource('mobiles', MobileController::class);
// love Resource Controllers
Route::resource('loves', LoveController::class);

// excel                                        這excel是controller裡的function名
Route::get('students_export', [StudentController::class, 'excel'])->name('students.excel');
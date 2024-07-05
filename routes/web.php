<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('index');
});

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

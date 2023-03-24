<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/generate-shorten-url', [App\Http\Controllers\ShortUrlController::class,'index']); 
Route::post('/generate-shorten-url', [App\Http\Controllers\ShortUrlController::class,'store'])->name('generate.shorten.url.post');
   
Route::get('/{code}',[App\Http\Controllers\ShortUrlController::class,'shortenUrl'] )->name('shorten.url');
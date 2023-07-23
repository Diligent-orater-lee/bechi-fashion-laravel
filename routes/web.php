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

Route::domain('verse.' . env('APP_URL'))->group(function () {
    Route::get('/', function () {
        return view('customer.verses.bechi-verse');
    });

    Route::get('pubg', function () {
        return view('customer.verses.pugb-verse');
    });
});

Route::get('/', function () {
    return view('customer.welcome');
});

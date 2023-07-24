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

Route::domain('admin.' . env('APP_URL'))->group(function () {
    Route::get('/', function () {
        return view('admin.home');
    })->name('admin.home');
});

Route::domain('verse.' . env('APP_URL'))->group(function () {
    Route::get('/', function () {
        return view('customer.verses.bechi-verse');
    })->name('verses.bechiverse');

    Route::get('pubg', function () {
        return view('customer.verses.pugb-verse');
    })->name('verses.pubgverse');

    Route::get('kera', function () {
        return view('customer.verses.kera-verse');
    })->name('verses.keraverse');
});

Route::get('/', function () {
    return view('customer.welcome');
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\VerseController;
use App\Http\Controllers\Customer\CustomerVerseController;
use App\Http\Controllers\Auth\LoginController;

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
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('/login', [LoginController::class, 'adminLogin'])->name('login');

    Route::post('/login', [LoginController::class, 'login'])->name('finishLogin');

    Route::post('/logout', [LoginController::class, 'logout'])->name('admin.logout');

    Route::prefix('verses')->group(function () {
        Route::get('/list', [VerseController::class, 'listVerses'])->name('admin.verses.managment');

        Route::get('/add', [VerseController::class, 'loadAddVerseView'])->name('admin.verses.addView');
        Route::post('/add', [VerseController::class, 'addVerse'])->name('admin.verses.add');
    });
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

    Route::prefix('models')->group(function () {
        Route::get('/{id}', [CustomerVerseController::class, "loadVerse"])->name('verses.models.loadSingleModel');
    });
});

Route::get('/', function () {
    return view('customer.welcome');
});

<?php

use App\Http\Controllers\RedirectShortenController;
use App\Http\Controllers\ShortenURLController;
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
Route::get('/', [ShortenURLController::class, 'render'])->name('home');
Route::post('shorten', [ShortenURLController::class, 'shortenUrl'])->name('shorten');
Route::get('{shortenCode}', RedirectShortenController::class)->name('redirect');
<?php

use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;



Route::get('/', [PagesController::class, 'index'])->name('index');
Route::get('/about', [PagesController::class, 'about'])->name('about');
Route::get('/service', [PagesController::class, 'services'])->name('service');
Route::get('/contact', [PagesController::class, 'contact'])->name('contact');
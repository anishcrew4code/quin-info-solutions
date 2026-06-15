<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\CaptchaController;

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Inner Pages
Route::get('/about',        [PageController::class, 'about'])->name('about');
Route::get('/services',     [PageController::class, 'services'])->name('services');
Route::get('/technologies', [PageController::class, 'technologies'])->name('technologies');
Route::get('/portfolio',    [PageController::class, 'portfolio'])->name('portfolio');

// Contact
Route::get('/contact',  [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.submit');

// Captcha
Route::get('/captcha',         [CaptchaController::class, 'generate'])->name('captcha.image');
Route::get('/captcha-refresh', [CaptchaController::class, 'refresh'])->name('captcha.refresh');


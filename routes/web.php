<?php

use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\PostController;

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
// use App\Services\Newsletter;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;
use MailchimpMarketing\ApiClient;






Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('post/{post:slug}', [PostController::class, 'show']);

Route::post('post/{post:slug}/comments', [PostCommentController::class, 'store']);

Route::post('newsletter',NewsletterController::class);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');





<?php

use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminPostController;

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

Route::get('admin/posts/create', [AdminPostController::class, 'create'])->middleware('admin');
Route::post('admin/posts', [AdminPostController::class, 'store'])->middleware('admin');
Route::get('admin/posts', [AdminPostController::class, 'index'])->middleware('admin');
Route::get('admin/posts/{post}/edit', [AdminPostController::class, 'edit'])->middleware('admin');

Route::patch('admin/posts/{post}/update', [AdminPostController::class,'update'])->middleware('admin');
Route::delete('admin/posts/{post}', [AdminPostController::class,'destroy'])->middleware('admin');
// <x-layout>
//     <x-setting heading="Edite Post --  {{$post->title}}">
    
//         <form action="/admin/posts" method="post" enctype="multipart/form-data"  class="bg-white shadow-md rounded px-2 pt-1 pb-8 mb-0">
//             @csrf
//             <x-forms.input name="title" value="{{ $post->title }}" />
//             <x-forms.input name="slug"  value="{{ $post->slug }}"/>
//             <x-forms.input name="thumbnail" type='file'  value="{{ $post->thumbnail }}"/>
//             <x-forms.textarea name="excerpt"     value="{{ $post->excerpt }}"/>
//             <x-forms.textarea name="body"     value="{{ $post->body  }}"/>
//             <x-forms.category />
//             <x-submit-button >Publish</x-submit-button>   
//         </form>
    
//     </x-setting>
//     </x-layout>
    
   
   

<?php

use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Log\Logger;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

use Spatie\YamlFrontMatter\YamlFrontMatter;

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



Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('post/{post:slug}', [PostController::class, 'show']);

//  make route for categories

Route::get('/categories/{categories:slug}', function (Category $categories) {

    return view('posts', [

        'posts' => $categories->posts,
        'currentCategory' => $categories,
        'categories' => Category::all()
    ]);
})->name('category');


Route::get('/authors/{author:username}', function (User $author) {
    return view('posts', [
        'posts' => $author->posts
    ]);
});





// just for rough

Route::get('/home', function () {
    return view('index');
});

Route::get('/num/{number}', function ($number) {


    // return $number;
    return view('number', ['number' => $number]);
});



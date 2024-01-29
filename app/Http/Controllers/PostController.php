<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response as HttpFoundationResponse;

class PostController extends Controller
{
    public function index()
    {
        // dd(Gate::allows('admin'));
        return view('posts.index', [
            'posts' => Post::latest()->filter(request(['search', 'category','author']))->paginate(6)->withQueryString()
            
        ]);
    }


    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post,
            'categories' => Category::all()

        ]);
    }

   

  
}
#MEZ-908031

// Database:	uuozpcvz_login
// Host:	localhost
// Username:	uuozpcvz_login
// Password:	Shri@!23

// Database:	uuozpcvz_learn
// Host:	localhost
// Username:	uuozpcvz_learn
// Password:	Shri@123
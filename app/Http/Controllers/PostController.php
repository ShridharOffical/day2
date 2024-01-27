<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response as HttpFoundationResponse;

class PostController extends Controller
{
    public function index()
    {

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

    public function create(){
       
        return view('posts.create'); 
    }

    public function store(){
        ddd(request()->file('thumbnail'));
        $data = request()->validate([
            'title' => 'required|max:255',
            'Excerpt' => 'required',
            'slug' => ['required', Rule::unique('posts', 'slug')],
            'body' => 'required',
            'category' => ['required', Rule::exists('categories', 'id')],
        ]);
        
        $data['category_id'] = $data['category'];
        $data['user_id'] = auth()->id();
     
        unset($data['category']); // Remove 'category' from $data as it's no longer needed
        Post::create($data);

        return redirect()->route('home'); // Use the correct route name 'home'
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
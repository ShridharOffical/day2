<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;



class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', ['posts' => Post::orderBy('updated_at', 'desc')->paginate(50)]);

    }
    public function store()
    {

        $data = request()->validate([
            'title' => 'required|max:255',
            'excerpt' => 'required',
            'slug' => ['required', Rule::unique('posts', 'slug')],
            'thumbnail' => 'required|image',
            'body' => 'required',
            'category' => ['required', Rule::exists('categories', 'id')],

        ]);


        $data['category_id'] = $data['category'];
        $data['user_id'] = auth()->id();
        $data['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        unset($data['category']);
        // Remove 'category' from $data as it's no longer needed
        Post::create($data);

        return redirect()->route('home');
        // Use the correct route name 'home'
    }
    public function create()
    {

        return view('admin.posts.create');
    }
    public function edit(Post $post)
    {
        return view('admin.posts.edit', ['post' => $post]);
    }
    public function update(Post $post)
    {

        $data = request()->validate([
            'title' => 'required|max:255',
            'excerpt' => 'required',
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post->id)],
            'thumbnail' => 'image',
            'body' => 'required',
            'category' => ['required', Rule::exists('categories', 'id')],

        ]);


        $data['category_id'] = $data['category'];
        $data['user_id'] = auth()->id();
       
       if(isset($data['thumbnail'])){
           $data['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
       }

        unset($data['category']);
        // Remove 'category' from $data as it's no longer needed
     
        $post->update($data);

     

        return back()->with('success','post updated successfully');
        // Use the correct route name 'home'
    }
    public function destroy(Post $post){
        $post->delete();
        return back()->with('success','post deleted successfully');
    }
}

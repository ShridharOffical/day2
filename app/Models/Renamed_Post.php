<?php
namespace App\Models;


use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

// use PhpParser\Node\Expr\FuncCall;

class Post

{
    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $path;

    public function __construct($title,$excerpt,$date,$body,$path)
    {
      $this->title = $title;
      $this->excerpt = $excerpt;
      $this->date = $date;
      $this->body = $body; 
      $this -> path = $path; 
    }


    public static function all(){


        return cache()->rememberForever('post.all',function(){
            return collect(File::files(resource_path("posts/")))
        ->map(fn($file)=>YamlFrontMatter::parseFile($file))
           
        
            ->map(fn ($document)=>
             new Post(
                $document->title,
                $document->excerpt,
                $document->date,
                $document->body(),
                $document->path
                
             ))
             ->sortBy('date');

        });
        
        

    }

    public static function find($slug)
    {
        
    return static::all()->firstWhere('path',$slug);

    }

    public static function findorFail($slug)
    {
        
    

    $post = static::find($slug);
    if (! $post){
        throw new ModelNotFoundException();
    }

    return $post;

    }
}
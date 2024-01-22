<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    use HasFactory;

    protected $with = ['category','author'];
    protected $gaurded =[];

    public function category(){

        return $this->belongsTo(Category::class);

    }

    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }

   
}

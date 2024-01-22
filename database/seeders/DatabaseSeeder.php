<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
            // when we do not want to refresh data
        // User::truncate();
        // Post::truncate();
        // Category::truncate();


        // This code for factory
        $user = User::factory()->create([
            'name'=>'John Doe'
        ]);

        Post::factory(30)->create([
            'user_id'=>$user->id
        ]);
        

//  This code for seeder 
        // $user = User::factory()->create();

        // $personal=Category::create([
        //     'name'=>'Personal',
        //     'slug'=>'personal'
        // ]);

        // $family=Category::create([
        //     'name'=>'Family',
        //     'slug'=>'family'
        // ]);

        // $work=Category::create([
        //     'name'=>'Work',
        //     'slug'=>'work'
        // ]);

        // // add Post data into post table by seeder

        // Post::create([
        //     'user_id'=> $user->id,
        //     'category_id'=>$family->id,
        //     'title'=>'My Family Post',
        //     'slug'=>'my-family-post',
        //     'excerpt'=>'<p>Lorem ipsum dollar sit amet</p>',
        //     'body'=>'<p>Indian-Origin Singapore Minister Resigns After Corruption Charges.
        //     ThaneMan Kills Ex Lover, Then Dies By Suicide. ...
        //     Bilkis Bano Case Convict Seeks 4 More Weeks To Surrender, Cites Poor Health.
        //     3 Border Force Personnel Injured In Fresh Mob Violence In Manipur.</p>'
        // ]);

        // Post::create([
        //     'user_id'=> $user->id,
        //     'category_id'=>$work->id,
        //     'title'=>'My Work Post',
        //     'slug'=>'my-work-post',
        //     'excerpt'=>'<p>Lorem ipsum dollar sit amet</p>',
        //     'body'=>'<p>Indian-Origin Singapore Minister Resigns After Corruption Charges.
        //     ThaneMan Kills Ex Lover, Then Dies By Suicide. ...
        //     Bilkis Bano Case Convict Seeks 4 More Weeks To Surrender, Cites Poor Health.
        //     3 Border Force Personnel Injured In Fresh Mob Violence In Manipur.</p>'
        // ]);



        // // \App\Models\User::factory()->create([
        // //     'name' => 'Test User',
        // //     'email' => 'test@example.com',
        // // ]);
    }
}

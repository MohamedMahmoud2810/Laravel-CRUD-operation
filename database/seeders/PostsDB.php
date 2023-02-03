<?php

namespace Database\Seeders;
use App\Models\Post;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostsDB extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0 ; $i<501 ; $i++){
            $add = new Post;
            $add->title = 'news title'.rand(0,499);
            $add->description = 'post description'.rand(0,499);
            $add->save();
        }
    }
}

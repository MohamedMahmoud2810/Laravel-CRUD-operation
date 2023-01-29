<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        $allposts = [
            [
                'id' => 1,
                'title' => 'laravel',
                'description' => 'hello this is laravel',
                'created_at' => '22/10/2810',

            ],
            [
                'id' => 2,
                'title' => 'laravel',
                'description' => 'hello this is laravel',
                'created_at' => '22/10/2810',

            ]
        ];

        return view('posts.index' , [
            'posts' => $allposts,
        ]);

    }

    public function create ()
    {
        return view('posts.create' );
    }

    public function store()
    {
        return view('posts.view');
    }

    public function show($postId)
    {
        return view('posts.show');
    }


}

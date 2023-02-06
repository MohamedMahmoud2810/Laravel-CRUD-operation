<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\HTTP\Requests\StorePostRequest;
use App\HTTP\Resources\PostResource;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return PostResource::collection($posts);

        // $response = [];
        // foreach($posts as $post)
        // {
        //     $response [] = [
        //         'id' => $post->id,
        //         'title' => $post->title,
        //         'description' => $post->description
        //     ];
        // }
        // return $response;


    }

    public function show($postId)
    {
        $post = Post::find($postId);

        return new PostResource($post);
        // return [
        //     'id' => $post->id,
        //         'title' => $post->title,
        //         'description' => $post->description
        // ];
    }

    public function store(StorePostRequest $request)
    {
        $data =  request()->all();


        $title = $data['title'];
        $description = $data['description'];
        $userId = $data['post_creator'];



        $post = Post::create([
            'title' => $title,
            'description' => $description,
            'user_id' => $userId,
        ]);
        return $post;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

use App\Models\User;
use App\HTTP\Requests\StorePostRequest;

use DateTime;


class PostController extends Controller
{
    public function getDate(){
        $date = new DateTime("2023-01-30 14:17:30");
        echo $date->format('l jS \o\f F Y h:i:s A');
    }

    public function index()
    {
        $allposts = Post::Paginate(10);

        return view('posts.index' , [
            'posts' => $allposts,
            // $posts = Post::where('id', '>', 100)->cursorPaginate(15),
        ]);

    }

    public function create ()
    {
        $users = User::get();
        return view('posts.create' ,[
            'users' => $users,
        ] );
    }

    public function store(StorePostRequest $request)
    {
        //get data from the form

        // $request->validate([
        //     'title'=>['required','min:3'],
        //     'description'=>['required','min:5'],
        // ],[
        //     'title.required' => 'this message is changed',
        //     'title.min' => 'minimum override message',
        // ]);

        $data =  request()->all();
        // dd($data);

        $title = $data['title'];
        $description = $data['description'];
        $userId = $data['post_creator'];

        // dd($data);

        Post::create([
            'title' => $title,
            'description' => $description,
            'user_id' => $userId,
        ]);

        return to_route('posts.index');




        // store data in database

        Post::create([
            'title' => 'this is from our code',
            'description' => 'this is from our code',
            'creator' => 'this is from our code',
        ]);

        // return view('posts.view');
    }

    public function show($postId)
    {
        $post = Post::find($postId);
        return view('posts.show' ,[
            'posts' => $post,
        ]);
    }

    public function edit($postId)
    {
        $post = Post::find($postId);
        return view('posts.edit' ,[
            'posts' => $post,
        ]);
    }

    public function update(Request  $request,$postId)
    {
        $post =  Post::find($postId);


        $post->update([
            'title' =>  $request->title,
            'description' => $request->description,
        ]);

        return to_route('posts.index');

        // $data =  request()->all();
        // dd($post);
        // $post->title =  request->title;
        // $post->description =  request->description;

        // $title = $data['title'];
        // $description = $data['description'];


    }

    public function destroy($postId=null)
    {
        Post::find($postId)->delete();
        return to_route('posts.index');
    }


}

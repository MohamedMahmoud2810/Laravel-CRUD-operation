<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\validator;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommentRequest;


class CommentController extends Controller
{

    public function store( $id ,StoreCommentRequest $request  )
    {

        $data = $request->all();
        // dd($data);

        $comment = $data['comment_body'];

        $post = Post::find($id);



        Comment::create([
            'comment_body'=>$comment,
            'post_id' => $id,
        ]);

        return redirect()->back()->with('message','Commented Seccessfully');

    }

    public function edit($id){
        $comment = Comment::find($id);
        return view('comments.edit' , ['comment_body'=>$comment]);
    }

    // public function update($id, Request $newComment)
    // {

    //     // get request data
    //     $newComment = request()->all();
    //     $comment = Comment::find($id);

    //     // if all inputs are given
    //     if ($newComment['comment']) {

    //         // set the new value
    //         $comment->comment = $newComment['comment'];

    //         // save the comment to database
    //         $comment->save();
    //         return redirect()->route('posts.show');
    //     }

    //     // if some input is empty
    //     else {
    //         return redirect()->route('comments.edit', ['comment' => $comment]);
    //     }
    // }








}

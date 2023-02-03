@extends('layouts.app')
@section('title') create @endsection

@section('content')


<form class="create-comment" method="POST" action="">
        @csrf
        @method('PUT')
        <textarea class="form-control" colspan="30" rows="10" name="comment_body" value="{{$comment->commnet_body}}" placeholder="What's on your mind?">{{ $comment->comment_body }}</textarea>
        <button type="submit">Update Comment</button>
    </form>


    @endsection



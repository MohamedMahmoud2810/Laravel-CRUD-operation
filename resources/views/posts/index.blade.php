@extends('layouts.app')

@section("content")

<div class="container">


<div class="text-center">
        <a href="{{route('posts.create')}}" class="mt-4 btn btn-success">Create Post</a>
    </div>



    <table class="table mt-4 container">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Created At</th>
            <th scope="col">Posted By</th>
            <th scope="col">Actions</th>
        </tr>

                @foreach($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->description}}</td>
                <td>{{$post->created_at->format('l jS \o\f F Y h:i:s A')}}</td>
                <td>{{$post->user?$post->user->name : 'not found'}}</td>

                <td>

                    <a href="{{route('posts.show' , $post->id)}}" class="btn btn-info">View</a>
                    <a href="{{route('posts.edit' , $post->id)}}" class="btn btn-primary">Edit</a>

                    <form action="{{route('posts.destroy' , $post->id)}}" class="d-inline" method="post">
                    @csrf
                    @method('delete')
                        <button type ="submit" onclick= "return confirm('Are You Sure To Delete ?')" class="btn btn-danger">Delete</button>
                    </form>

                </td>
                @endforeach

            </tr>
        </thead>
        <tbody>
        </table>

        {{$posts->onEachSide(1)->links()}}
        </div>
        @endsection




        
















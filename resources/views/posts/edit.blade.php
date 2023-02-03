@extends ('layouts.app')

@section('title') create @endsection

@section('content')
    <form method="POST" action="{{route( 'posts.update' , $posts->id )}}">
        @csrf
        @method('put')

        <div class="container">
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input name ="title" type="text" value="{{$posts->title}}" class="form-control" >
        </div>
        <div class="mb-3">
            <label  class="form-label">Description</label>
            <textarea
                name = "description"
                class="form-control"
            >{{$posts->description}}</textarea>
        </div>


        <button type="submit" class="btn btn-success">Update</button>
        </div>
    </form>

    @endsection

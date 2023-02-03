@extends ('layouts.app')


@section('title') create @endsection

@section('content')



    <div class="card ">
        <div>
            <div class="card-header">
            <h3 class="card-body text-center">{{$posts->title}}</h3>
            </div>

            <div class="cord-body container">
                <div class="card-body ">
                    <h5 class="card-title">ID : {{$posts->id}}</h5>
                    <h5 class="card-text">Title : {{$posts->title}}</h5>
                    <h5 class="card-text">Description : {{$posts->description}}</h5>
                    <h5 class="card-text">Created at : {{$posts->created_at->format('l jS \o\f F Y h:i:s A')}}</h5>

                </div>
            </div>
        </div>
    </div>


    <div class="comment-area mt-4 container p-3 w-50 mt-5">

        <div class="card card-body w-75
        ">
                @if(session('message'))
                    <h6 class="alert alert-warning mb-3">{{session('message')}}</h6>
                @endif
            <h6 class="card-title">Leave a comment</h6>
            <form action="{{route('posts.comment' , $posts->id)}}" method="POST">
                @csrf
                <textarea class="form-control" name="comment_body" cols="30" rows="10" required></textarea>
                <button type="submit" class="btn btn-primary mt-3">Add Comment</button>
            </form>
        </div>
    </div>

    @forelse ($posts->comments as $comment)


    <div class="card card-body shadow-sm mt-3 container w-50">
        <div class="detail-area">
            <small class="ms-3 text-primary">Commet on: {{$comment->created_at->format('d-m-y')}}</small>
            </h5>
            <p class="user-comment mb-1">
                {{ $comment->comment_body }}

            </p>
        </div>




    </div>


        @empty
        <h6 class="text-center me-5">no comments yet</h6>
        @endforelse










    @endsection

@extends ('layouts.app')

@section('thisIsPage')
    <form meteod="POST" action="/posts">
        @csrf
        <div class="container">


        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" class="form-control" >
        </div>
        <div class="mb-3">
            <label  class="form-label">Description</label>
            <textarea
                class="form-control"
            ></textarea>
        </div>
        <div class="mb-3">
            <label class="form-check-label">Post Creator</label>

            <select class="form-control">
                <option>Ahmed</option>
                <option>Mohamed</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </form>

    @endsection


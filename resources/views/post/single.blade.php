@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="title">{{$post->title}}</h1>
            <p>{!!$post->content!!}</p>
            @auth()
            @if(Auth::user()->id == $post->author)
            <button type="button" class="btn btn-success" onclick="event.preventDefault(); document.getElementById('publish-post-form').submit();">Publish post</button>
            <a href="../posts/{{$post->id}}/edit"><button type="button" class="btn btn-primary">Edit post</button></a>
            <form id="publish-post-form" action="/posts/{{$post->id}}" method="post" style="display: none;">
                @csrf
            </form>
            @endif
            @endauth
            <hr>
            <div class="comments">
                <h3 class="comments-title">Comment section</h3>
                @foreach($post->comments as $comment)
                {{$comment->user_id}}: {{$comment->comment}}
                    @auth()
                    @if(Auth::user()->id == $comment->user_id)
                    <a href="../posts/{{$comment->id}}/edit"><button type="button" class="btn btn-primary commentbutton">Edit</button></a>
                    <a href="../posts/{{$comment->id}}/edit"><button type="button" class="btn btn-danger commentbutton">Delete</button></a>
                    @endif
                    @endauth()
                    <br/>
                @endforeach
            </div>
            @auth()
            <br/>
            <hr>
            <div class="new-comment">
                <h4>New comment:</h4>
                <form action="/posts/{{$post->id}}/comment" method="post">
                    @csrf
                    <div class="form-group">
                        <textarea class="form-comtrol" name="txtComment" id="txtComment" rows="5" cols="50"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Save comment</button>
                </form>
            </div>
            @endauth
        <div>
    </div>
</div>
@endsection
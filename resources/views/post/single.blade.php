@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="title">{{$post->title}}</h1>
            <p>{!!$post->content!!}</p>
            @auth()
            @if(!$post->published_at && Auth::user()->can('publish',$post))
            <button type="button" class="btn btn-success" onclick="event.preventDefault(); document.getElementById('publish-post-form').submit();">Publish post</button>
            <form id="publish-post-form" action="/posts/{{$post->id}}/publish" method="POST" style="display: none;">
                @csrf
            </form>
            @endif
            @endauth()
            @can('update', $post)
            <a href="../posts/{{$post->id}}/edit"><button type="button" class="btn btn-primary">Edit post</button></a>
            @endcan
            <hr>
            <div class="comments">
                <h3 class="comments-title">Comment section</h3>
                @foreach($post->comments as $comment)
                {{(DB::table('users')->where('id', $comment->user_id)->get())->first()->name}}: {{$comment->comment}}
                @can('delete', $comment)
                    <button class="btn btn-danger commentbutton" onclick="event.preventDefault(); document.getElementById('delete-comment-form-{{$comment->id}}').submit();">
                        Delete
                    </button>
                    <form id="delete-comment-form-{{$comment->id}}" action="/comment/{{$comment->id}}" method="post" style="display: none;">
                        @csrf
                        @method('delete')
                    </form>
                    @endcan
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
@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8 post-create">
        <h1 class="title">Edit a post</h1>
        <hr>
        <form action="/posts/{{$post->id}}" method="POST">
            @csrf
            @method('put')
            <div class="form-group">
            <label for="txtTitle">Title:</label>
            <input type="text" class="form-control" name="txtTitle" id="txtTitle" value="{{$post->title}}">
            </div>
            <div class="form-group">
                <label for="txtSlug">Slug:</label>
                <input type="text" class="form-control" name="txtSlug" id="txtSlug" value="{{$post->slug}}">
            </div>
            <div class="form-group">
                <label for="txtContent">Content:</label>
                <textarea type="text" class="form-control" name="txtContent" id="txtContent" rows="10">{{$post->content}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save post</button>
            <button class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('delete-post-form').submit();">
                Delete post
            </button>
        </form>
        <form id="delete-post-form" action="/posts/{{$post->id}}" method="post" style="display: none;">
            @csrf
            @method('delete')
        </form>
    </div>
</div>
@endsection
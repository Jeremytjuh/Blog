@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8 posts">
            <h1 class="title">Laatste posts</h1>
            @foreach ($posts as $post)
                <hr>
                <div class="row post">
                    <div class="col-md-8">
                        <h3 class="post-title"><a href="/post/{{$post->slug}}">{{$post->title}}</a></h2>
                    </div>
                    <div class="col-md-4">
                        <div class="pull-right post-published-at">
                            <i>Gemaakt op: {{$post->created_at}}</i><br>
                            <i>Gepubliceerd op: {{$post->published_at}}</i><br>
                        </div>
                    </div>
                </div>
            @endforeach
            {{$posts->links()}}
        </div>
    </div>
</div>
@endsection
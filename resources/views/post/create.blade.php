@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8 post-create">
        <h1 class="title">Nieuwe post maken</h1>
        <hr>
        <form action="/posts" method="POST">
            @csrf
            <div class="form-group">
            <label for="txtTitle">Titel:</label>
            <input type="text" class="form-control" name="txtTitle" id="txtTitle">
            </div>
            <div class="form-group">
                <label for="txtSlug">Slug:</label>
                <input type="text" class="form-control" name="txtSlug" id="txtSlug">
            </div>
            <div class="form-group">
                <label for="txtContent">Inhoud:</label>
                <textarea type="text" class="form-control" name="txtContent" id="txtContent" rows="10"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save post</button>
        </form>
    </div>
</div>
@endsection
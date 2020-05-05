<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Post;

class PostController extends Controller
{
    public function index(){
        return view("post.index")->withPosts(DB::table('posts')->orderBy('id', 'desc')->simplePaginate(1));
    }

    public function single($slug){
        return view("post.single")->withPost(Post::where('slug', $slug)->firstOrFail());
    }

    public function create(){
        return view("post.create");
    }

    public function store(){
        $post = new Post();
        $post->title = request('txtTitle');
        $post->slug = request('txtSlug');
        $post->content = request('txtContent');
        $post->author = 1;
        $post->save();
        return redirect('/posts');
    }

    public function edit($id){
        $post = Post::findOrFail($id);
        return view("post.edit")->withPost($post);
    }

    public function update($id){
        $post = Post::findOrFail($id);
        $post->title = request('txtTitle');
        $post->slug = request('txtSlug');
        $post->content = request('txtContent');
        $post->author = 1;
        $post->save();
        return redirect()->route('post.single',$post->slug);
    }

    public function destroy($id){
        Post::findOrFail($id)->delete();
        return redirect()->route('post.index');
    }

    public function publish($id){
        $post = Post::findOrFail($id);

        $post->published_at = now();
        $post->save();

        return redirect()->route('post.single', $post->slug);
    }
}


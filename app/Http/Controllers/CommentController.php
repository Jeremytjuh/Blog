<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Comment;
use App\Post;

class CommentController extends Controller
{
    public function store($postid) {
        $post = Post::findOrFail($postid);

        $comment = new Comment();
        $comment->comment = request('txtComment');
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $post->id;
        $comment->save();
        return redirect()->route('post.single', $post->slug);
    }

    public function delete
}

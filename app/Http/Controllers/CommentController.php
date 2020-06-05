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

    public function destroy($commentid){
        $comment = Comment::findOrFail($commentid);
        if(Auth::user()->can('delete', $comment)){
            $comment->delete();
            return redirect()->route('post.single', $comment->post->slug);
        }
        abort(403, 'This action is unauthorized.');
    }
}

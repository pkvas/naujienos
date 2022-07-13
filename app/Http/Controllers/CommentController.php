<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Http\Requests\StoreCommentRequest;

class CommentController extends Controller
{
    public function store(StoreCommentRequest $request)
    {
        $post = Post::where('slug', $request->post_slug)->firstOrFail();
        if($post) {
            $comment = new Comment();
            $comment->email   = $request->email;
            $comment->content = $request->message;
            $comment->post_id = $post->id;
            $comment->save();
            return back();
        } else {
            return back();
        }

    }
}

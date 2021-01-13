<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Repositories\PostRepository;

class CommentController extends Controller
{
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }
    public function store(Request $request)
    {
        $comment = new Comment();

        $postId = $request->post_id;
        $comment->comment = $request->comment;

        $comment->user()->associate($request->user());
        $post = $this->postRepository->post($postId);

        $post->comments()->save($comment);

        return response()->json(['status' => 200]);
    }

    public function replyStore(Request $request)
    {
        $reply = new Comment();
        $reply->comment = $request->get('comment');
        $postId = $request->post_id;

        $reply->user()->associate($request->user());

        $reply->parent_id = $request->get('comment_id');

        $post = $this->$this->postRepository->post($postId);

        $post->comments()->save($reply);

        return response()->status(200);
    }
}

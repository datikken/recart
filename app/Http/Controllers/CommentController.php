<?php

namespace App\Http\Controllers;

use App\Http\Resources\CommentResource;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function get()
    {
        $comments = Comment::with([
            'user',
            'post',
            'children.user',
        ])
            ->latest()
            ->get();

        return CommentResource::collection(
            $comments
        );
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'id' => 'required',
            'post_id' => 'required',
            'user_id' => 'required',
            'parent_id' => 'required'
        ])->validate();

        $id = $request->id;
        $post_id = $request->post_id;
        $body = $request->body;
        $user_id = Auth::id();
        $parent_id = isset($request->parent_id) ? $request->parent_id : null;

        $comment = new Comment([
            'id' => $id,
            'post_id' => $post_id,
            'body' => $body,
            'user_id' => $user_id,
            'parent_id' => $parent_id
        ]);

        return $comment;
    }

    public function getPostComments(Request $request)
    {
        $id = $request->id;

        if (!$id) throw new \Exception('Post id should be provided');

        $comments = Comment::with([
            'user',
            'post',
            'children.user',
        ])
            ->where('post_id', $id)
            ->latest()
            ->get();

        return CommentResource::collection(
            $comments
        );
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $user_id = Auth::id();

        if (!$id) throw new \Exception('Comment id should be provided');
        if (!$user_id) throw new \Exception('User should be logged in');

        //Maybe you should not do it
        Comment::where([
            'id' => $id,
            'user_id' => $user_id
        ])
            ->update(array('hidden' => 1));

//        Comment::where([
//            'id' => $id,
//            'user_id' => $user_id
//        ])
//            ->delete();

        return response()->json(['status' => 200, 'message' => 'comment successfully deleted']);
    }
}

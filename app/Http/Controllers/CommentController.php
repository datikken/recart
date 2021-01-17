<?php

namespace App\Http\Controllers;

use App\Http\Resources\CommentResource;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index()
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

    public function destroy()
    {

    }
}

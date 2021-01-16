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
            'children',
            'children.children',
            'children.children.children'
        ])
            ->isParent()
            ->latest()
            ->get();

        return CommentResource::collection(
            $comments
        );
    }
}

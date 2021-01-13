<?php


namespace App\Repositories;

use App\Repositories\Interfaces\PostRepositoryInterface;
use App\Models\User;
use App\Models\Post;

class PostRepository implements PostRepositoryInterface
{
    public function all()
    {
        return Post::with('likes')->get();
    }
    public function post($id)
    {
        $post = Post::with('likes')->where('id', $id)->get();

        return $post;
    }
    public function getByUser(User $user)
    {
        return Post::where('user_id'. $user->id)->get();
    }
}

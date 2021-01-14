<?php


namespace App\Repositories;

use App\Repositories\Interfaces\PostRepositoryInterface;
use App\Models\User;
use App\Models\Post;

class PostRepository implements PostRepositoryInterface
{
    public function all()
    {
        return Post::with('Likes')->get();
    }

    public function post($id)
    {
        $post = Post::where('id', $id)
            ->with('Likes')
            ->get();

        $next = Post::where('id', '>', $id)
            ->orderBy('id')
            ->value('id');

        return array('post' => $post, 'next' => $next);
    }

    public function getByUser(User $user)
    {
        return Post::where('user_id'. $user->id)->get();
    }
}

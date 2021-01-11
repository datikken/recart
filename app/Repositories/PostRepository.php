<?php


namespace App\Repositories;

use App\Repositories\Interfaces\PostRepositoryInterface;
use App\Models\User;
use App\Models\Post;

class PostRepository implements PostRepositoryInterface
{
    public function all()
    {
        return Post::all();
    }
    public function post($id)
    {
        return Post::where($id);
    }
    public function getByUser(User $user)
    {
        return Post::where('user_id'. $user->id)->get();
    }
}
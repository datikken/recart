<?php


namespace App\Repositories;

use App\Repositories\Interfaces\PostRepositoryInterface;
use App\Models\User;
use App\Models\Post;
use App\Models\Like;
use App\Models\Comment;

class PostRepository implements PostRepositoryInterface
{
    public function all()
    {
        return Post::with('likes')->get();
    }
    public function post($id)
    {
        $post = Post::with('likes')->where('id', $id)->get();
//        $likes = Like::where('post_id', $id)->get();
//        $comments = Comment::where('post_id', $id)->get();

//        $result = array(
//            'post' => $post,
//            'likes' => $likes,
//            'comments' => $comments
//        );

        return $post;
    }
    public function getByUser(User $user)
    {
        return Post::where('user_id'. $user->id)->get();
    }
}

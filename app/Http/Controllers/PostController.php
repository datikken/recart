<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Repositories\Interfaces\PostRepositoryInterface;

class PostController extends Controller
{
    private $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function index()
    {
        return Inertia::render('Blog/Blog');
    }

    public function getAllPosts()
    {
        $posts = $this->postRepository->all();

        return $posts;
    }

    public function detail($id)
    {
        return Inertia::render('Blog/BlogPost', [
            'id' => $id
        ]);
    }

    public function get(Request $request)
    {
        $id = $request->id;
        $post = $this->postRepository->post($id);

        return $post;
    }

    public function getPostLikesAndDislikes(Request $request)
    {
        $post_id = $request->post_id;

        $likesAndDislikes = $this->postRepository->getLikesAndDislikes($post_id);

        return $likesAndDislikes;
    }

    public function likePost(Request $request)
    {
        $id = $request->id;
        $like = $this->postRepository->likePost($id);

        return $like;
    }
}

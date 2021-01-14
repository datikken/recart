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
        $posts = $this->postRepository->all();

        return Inertia::render('Blog/Blog',[
            'posts' => $posts
        ]);
    }

    public function detail($id)
    {
        $post = $this->get($id);

        return Inertia::render('Blog/BlogPost',[
            'post' => $post
        ]);
    }

    public function get($id)
    {
        $post = $this->postRepository->post($id);

        return $post;
    }

    public function likePost(Request $request)
    {
        $id = $request->id;
        $like = $this->postRepository->likePost($id);

        return $like;
    }
}

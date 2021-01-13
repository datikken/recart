<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Inertia\Inertia;
use App\Repositories\Interfaces\PostRepositoryInterface;
use App\Models\Comment;

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
            'posts' => $posts,
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
}

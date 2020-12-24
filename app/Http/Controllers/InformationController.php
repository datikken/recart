<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\InformationPost;

class InformationController extends Controller
{
    public function index()
    {
        $posts = InformationPost::all();

        return Inertia::render('Information/Information',[
            'information_posts' => $posts
        ]);
    }
}

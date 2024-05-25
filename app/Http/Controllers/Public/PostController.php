<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Contracts\Support\Renderable;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Renderable
    {
        $posts = Post::published()
            ->orderBy('created_at', 'desc')
            ->paginate();

        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function show(Post $post): Renderable
    {
        return view('posts.show', ['post' => $post]);
    }
}

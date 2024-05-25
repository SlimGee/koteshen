<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Spatie\QueryBuilder\QueryBuilder;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Renderable
    {
        $posts = QueryBuilder::for(Post::class)
            ->defaultSort('-created_at')
            ->allowedSorts('title', 'created_at')
            ->paginate();

        return view('admin.posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $post = auth()->user()->posts()->create($data);

        return to_route('admin.posts.index')->with('success', 'You have successfully added a new post');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post): Renderable
    {
        return view('admin.posts.show', ['post' => $posts]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post): Renderable
    {
        return view('admin.posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post): RedirectResponse
    {
        $post->update($request->validated());

        return to_route('admin.posts.index')->with('success', 'You successfully updated this post');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();

        return to_route('admin.posts.index')->with('success', 'You successfully removed that post');
    }
}

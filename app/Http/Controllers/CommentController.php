<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Comment;
use Butschster\Head\Facades\Meta;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\HtmlString;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  any<Model>  $commentable
     */
    public function index($commentable): Renderable
    {
        Meta::prependTitle('Invoice Comments')
            ->setDescription('Create and manage invoices for your business')
            ->setKeywords(['billing', 'invoicing', 'online payments', 'small business']);

        return view('app.comments.index', [
            'comments' => $commentable->comments,
            'commentable' => $commentable,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  any<Model>  $commentable
     */
    public function create($commentable): Renderable
    {
        if (request()->wasFromTurboFrame(dom_id($commentable, 'create_comment'))) {
            return view('app.comments._form', [
                'commentable' => $commentable,
            ]);
        }

        return view('app.comments.create', [
            'commentable' => $commentable,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  any<Model>  $commentable
     */
    public function store(StoreCommentRequest $request, $commentable)
    {
        $comment = $commentable->comments()->create([
            ...$request->validated(),
            'user_id' => auth()->user()->id,
        ]);

        if (request()->wantsTurboStream()) {
            return turbo_stream([
                turbo_stream()
                    ->target(dom_id($commentable, 'comments'))
                    ->action('prepend')
                    ->view('app.comments._comment', ['comment' => $comment]),
                turbo_stream()->update(
                    dom_id($commentable, 'comments_count'),
                    new HtmlString(
                        $commentable->comments()->count()
                    ),
                ),
            ]);
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  any<Model>  $commentable
     */
    public function show($commentable, Comment $comment)
    {
        return view('app.comments._comment', [
            'comment' => $comment,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  any<Model>  $commentable
     */
    public function edit($commentable, Comment $comment)
    {
        if (request()->wasFromTurboFrame(dom_id($comment, 'comment'))) {
            return view('app.comments._form', [
                'commentable' => $commentable,
                'comment' => $comment,
            ]);
        }

        return view('app.comments.edit', [
            'commentable' => $commentable,
            'comment' => $comment,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  any<Model>  $commentable
     */
    public function update(UpdateCommentRequest $request, $commentable, Comment $comment)
    {
        $comment->update($request->validated());

        if (request()->wantsTurboStream()) {
            return turbo_stream([
                turbo_stream()
                    ->target(dom_id($comment))
                    ->view('app.comments._comment', ['comment' => $comment])
                    ->action('replace'),
                turbo_stream()->update(
                    dom_id($commentable, 'comments_count'),
                    new HtmlString(
                        $commentable->comments()->count()
                    ),
                ),
            ]);
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  any<Model>  $commentable
     */
    public function destroy($commentable, Comment $comment)
    {
        $comment->delete();

        if (request()->wantsTurboStream()) {
            return turbo_stream([
                turbo_stream($comment)
                    ->action('remove'),
            ]);
        }

        return back();
    }
}

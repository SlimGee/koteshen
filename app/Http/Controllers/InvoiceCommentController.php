<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Comment;
use App\Models\Invoice;
use Butschster\Head\Facades\Meta;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\HtmlString;

class InvoiceCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Invoice $invoice): Renderable
    {
        Meta::prependTitle('Invoice Comments')
            ->setDescription('Create and manage invoices for your business')
            ->setKeywords(['billing', 'invoicing', 'online payments', 'small business']);

        return view('app.invoices.comments.index', [
            'comments' => $invoice->comments,
            'invoice' => $invoice,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Invoice $invoice, Request $request): Renderable
    {
        if ($request->wasFromTurboFrame(dom_id($invoice, 'create_comment'))) {
            return view('app.invoices.comments._form', [
                'commentable' => $invoice,
            ]);
        }

        return view('app.invoices.comments.create', [
            'commentable' => $invoice,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request, Invoice $invoice)
    {
        $comment = $invoice->comments()->create([
            ...$request->validated(),
            'user_id' => auth()->user()->id,
        ]);

        if (request()->wantsTurboStream()) {
            return turbo_stream([
                turbo_stream()
                    ->target(dom_id($invoice, 'comments'))
                    ->action('prepend')
                    ->view('app.invoices.comments._comment', ['comment' => $comment]),
                turbo_stream()->update(
                    dom_id($invoice, 'comments_count'),
                    new HtmlString(
                        $invoice->comments()->count()
                    ),
                ),
            ]);
        }

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice, Comment $comment)
    {
        return view('app.invoices.comments._comment', [
            'comment' => $comment,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice, Comment $comment)
    {
        if (request()->wasFromTurboFrame(dom_id($comment, 'edit_comment'))) {
            return view('app.invoices.comments._form', [
                'invoice' => $invoice,
            ]);
        }

        return view('app.invoices.comments.edit', [
            'invoice' => $invoice,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Invoice $invoice, Comment $comment)
    {
        $comment->update($request->validated());

        if (request()->wantsTurboStream()) {
            return turbo_stream([
                turbo_stream($comment)
                    ->view('app.invoices.comments._comment', ['comment' => $comment])
                    ->action('replace'),
            ]);
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice, Comment $comment)
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

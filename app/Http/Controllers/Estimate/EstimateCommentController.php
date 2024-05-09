<?php

namespace App\Http\Controllers\Estimate;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Estimate;
use Butschster\Head\Facades\Meta;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class EstimateCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Estimate $estimate): Renderable
    {
        Meta::prependTitle('Estimate Comments')
            ->setDescription('Create and manage invoices for your business')
            ->setKeywords(['billing', 'invoicing', 'online payments', 'small business']);

        return view('app.estimates.comments.index', [
            'comments' => $estimate->comments,
            'estimate' => $estimate,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Estimate $estimate)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Estimate $estimate)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Estimate $estimate, Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Estimate $estimate, Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Estimate $estimate, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Estimate $estimate, Comment $comment)
    {
        //
    }
}

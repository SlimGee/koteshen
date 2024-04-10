<?php

namespace App\Http\Controllers\Onboarding;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBusinessRequest;
use Illuminate\Contracts\Support\Renderable;

class BusinessController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(): Renderable
    {
        return view('app.onboarding.business.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBusinessRequest $request)
    {
        $data = $request->validated();

        $request->user()->businesses()->create([
            'phone_country' => $request->phone_country,
            'current' => !auth()->user()->businesses()->exists(),
            ...$data,
        ]);

        return redirect()->route('app.home.index');
    }
}

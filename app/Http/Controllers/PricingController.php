<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;

class PricingController extends Controller
{
    public function index(): Renderable
    {
        return view('pricing.index');
    }
}

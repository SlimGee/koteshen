<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;

class PageController extends Controller
{
    public function show(string $page): Renderable
    {
        if (!view()->exists('pages.' . $page)) {
            abort(404);
        }

        return view('pages.' . $page);
    }
}

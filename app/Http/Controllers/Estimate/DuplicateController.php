<?php

namespace App\Http\Controllers\Estimate;

use App\Enum\EstimateStatus;
use App\Http\Controllers\Controller;
use App\Models\Estimate;
use Illuminate\Http\RedirectResponse;

class DuplicateController extends Controller
{
    public function store(Estimate $estimate): RedirectResponse
    {
        $duplicate = $estimate->replicate();
        $duplicate->number = null;
        $duplicate->status = EstimateStatus::DRAFT;
        $duplicate->emailed_at = null;
        $duplicate->emailed = false;

        $duplicate->date = now();

        $duplicate->save();

        $duplicate->items()->createMany(
            $estimate->items->map->only(['description', 'quantity', 'price', 'total', 'name'])
        );

        return to_route('app.estimates.edit', $duplicate)->with('success', 'Estimate duplicated successfully');
    }
}

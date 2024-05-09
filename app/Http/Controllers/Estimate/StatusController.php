<?php

namespace App\Http\Controllers\Estimate;

use App\Enum\EstimateStatus;
use App\Http\Controllers\Controller;
use App\Models\Estimate;
use Illuminate\Http\RedirectResponse;

class StatusController extends Controller
{
    public function update(Estimate $estimate, EstimateStatus $status): RedirectResponse
    {
        $estimate->update([
            'status' => $status,
        ]);

        return to_route('app.estimates.show', $estimate)->with('success', 'Estimate status updated successfully.');
    }
}

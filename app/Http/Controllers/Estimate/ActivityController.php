<?php

namespace App\Http\Controllers\Estimate;

use App\Http\Controllers\Controller;
use App\Models\Estimate;
use Butschster\Head\Facades\Meta;
use Illuminate\Contracts\Support\Renderable;
use Spatie\Activitylog\Models\Activity;

class ActivityController extends Controller
{
    public function index(Estimate $estimate): Renderable
    {
        Meta::prependTitle('Estimate Activity')
            ->setDescription('Create and manage invoices for your business')
            ->setKeywords(['billing', 'invoicing', 'online payments', 'small business']);

        $activities = Activity::where('subject_id', $estimate->id)
            ->where('subject_type', Estimate::class)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('app.estimates.activities.index', [
            'activities' => $activities,
            'estimate' => $estimate,
        ]);
    }
}

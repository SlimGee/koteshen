<?php

namespace App\Http\Controllers;

use Butschster\Head\Facades\Meta;
use Butschster\Head\Packages\Entities\OpenGraphPackage;
use Butschster\Head\Packages\Entities\TwitterCardPackage;
use Illuminate\Contracts\Support\Renderable;

class HomeController extends Controller
{
    public function index(): Renderable
    {
        Meta::prependTitle('Dashboard')
            ->setDescription('Create and send professional invoices in minutes. Get paid faster with automated reminders and online payments.')
            ->setKeywords(['billing', 'invoicing', 'online payments', 'small business'])
            ->registerPackage(
                (new OpenGraphPackage('website'))
                    ->setUrl(route('app.home.index'))
                    ->setTitle('Intelligent Billing & Invoicing for Small Businesses')
                    ->setDescription('Create and send professional invoices in minutes. Get paid faster with automated reminders and online payments.')
                    ->addImage(asset('images/cover.jpg'))
            )
            ->registerPackage(
                (new TwitterCardPackage('summary_large_image'))
                    ->setType('summary')
                    ->setSite('@koteshen')
                    ->setCreator('@ncubegiven_')
                    ->setTitle('Intelligent Billing & Invoicing for Small Businesses')
                    ->setDescription('Create and send professional invoices in minutes. Get paid faster with automated reminders and online payments.')
                    ->setImage(asset('images/cover.jpg'))
            );

        $business = auth()->user()->business;

        $outstanding = $business->invoices()->sum('balance');
        $revenue = $business->payments()->sum('amount');
        $totalClients = $business->clients()->count();
        $overdueInvoices = $business->invoices()->overdue()->get()->count();
        $invoices = $business->invoices()->latest()->limit(6)->get();

        $incomeChart = $business->payments()->get()->groupBy(function ($payment) {
            return $payment->created_at->format('d M');
        })->map(function ($payments) {
            return $payments->sum('amount');
        });

        return view('app.home.index', [
            'outstanding' => $outstanding,
            'revenue' => $revenue,
            'totalClients' => $totalClients,
            'overdueInvoices' => $overdueInvoices,
            'invoices' => $invoices,
            'incomeChart' => $incomeChart,
        ]);
    }
}

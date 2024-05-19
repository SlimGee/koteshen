<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Invoice;
use App\Models\Payment;
use Butschster\Head\Facades\Meta;
use Butschster\Head\Packages\Entities\OpenGraphPackage;
use Butschster\Head\Packages\Entities\TwitterCardPackage;
use Illuminate\Contracts\Support\Renderable;

class HomeController extends Controller
{
    public function index(): Renderable
    {
        Meta::prependTitle('Intelligent Billing & Invoicing for Small Businesses')
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

        $outstanding = Invoice::query()->sum('balance');
        $revenue = Payment::query()->sum('amount');
        $totalClients = Client::query()->count();
        $overdueInvoices = Invoice::overdue()->get()->count();
        $invoices = Invoice::latest()->limit(6)->get();

        $incomeChart = Payment::all()->groupBy(function ($payment) {
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

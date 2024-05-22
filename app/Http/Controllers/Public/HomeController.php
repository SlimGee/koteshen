<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Butschster\Head\Facades\Meta;
use Butschster\Head\Packages\Entities\OpenGraphPackage;
use Butschster\Head\Packages\Entities\TwitterCardPackage;
use Illuminate\Contracts\Support\Renderable;

class HomeController extends Controller
{
    public function index(): Renderable
    {
        Meta::prependTitle('Invoicing Stress & Wasted Time? Get Koteshen & Get Back to Business')
            ->setDescription('Ditch clunky spreadsheets and invoicing dread. Koteshen automates your billing, so you get paid faster, reduce errors, and gain the financial clarity you need.')
            ->setKeywords(['invoice software', 'billing software', 'invoicing software', 'online invoicing software', 'online billing software', 'invoice app', 'billing app', 'invoicing app', 'online invoicing app', 'online billing app', 'invoice system', 'billing system', 'invoicing system', 'online invoicing system', 'online billing system', 'invoice management software', 'billing management software', 'invoicing management software', 'online invoicing management software', 'online billing management software', 'invoice management app', 'billing management app', 'invoicing management app', 'online invoicing management app', 'online billing management app', 'invoice management system', 'billing management system', 'invoicing management system', 'online invoicing management system', 'online billing management system'])
            ->registerPackage(
                (new OpenGraphPackage('website'))
                    ->setUrl(route('home.index'))
                    ->setTitle('Invoicing Stress & Wasted Time? Get Koteshen & Get Back to Business')
                    ->setDescription('Ditch clunky spreadsheets and invoicing dread. Koteshen automates your billing, so you get paid faster, reduce errors, and gain the financial clarity you need.')
                    ->addImage(asset('images/banner.jpg'))
            )
            ->registerPackage(
                (new TwitterCardPackage('summary_large_image'))
                    ->setType('summary_large_image')
                    ->setTitle('Invoicing Stress & Wasted Time? Get Koteshen & Get Back to Business')
                    ->setDescription('Ditch clunky spreadsheets and invoicing dread. Koteshen automates your billing, so you get paid faster, reduce errors, and gain the financial clarity you need.')
                    ->setImage(asset('images/banner.jpg'))
            );

        return view('home.index-beta');
    }
}

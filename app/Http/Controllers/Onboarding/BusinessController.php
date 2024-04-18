<?php

namespace App\Http\Controllers\Onboarding;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBusinessRequest;
use Butschster\Head\Facades\Meta;
use Butschster\Head\Packages\Entities\OpenGraphPackage;
use Butschster\Head\Packages\Entities\TwitterCardPackage;
use Illuminate\Contracts\Support\Renderable;

class BusinessController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(): Renderable
    {
        Meta::prependTitle('Create your business profile')
            ->setDescription('Start by creating your business profile to get started with invoicing.')
            ->setKeywords(['billing', 'invoicing', 'online payments', 'small business'])
            ->registerPackage(
                (new OpenGraphPackage('website'))
                    ->setUrl(route('app.onboarding.business.create'))
                    ->setTitle('Create your business profile')
                    ->setDescription('Start by creating your business profile to get started with invoicing.')
                    ->addImage(asset('images/cover.jpg'))
            )
            ->registerPackage(
                (new TwitterCardPackage('summary_large_image'))
                    ->setType('summary')
                    ->setSite('@koteshen')
                    ->setCreator('@ncubegiven_')
                    ->setTitle('Create your business profile')
                    ->setDescription('Start by creating your business profile to get started with invoicing.')
                    ->setImage(asset('images/cover.jpg'))
            );

        $categories = [
            'Accounting',
            'Airlines/Aviation',
            'Alternative Dispute Resolution',
            'Alternative Medicine',
            'Animation',
            'Apparel & Fashion',
            'Architecture & Planning',
            'Arts & Crafts',
            'Automotive',
            'Aviation & Aerospace',
            'Banking',
            'Biotechnology',
            'Broadcast Media',
            'Building Materials',
            'Business Supplies & Equipment',
            'Capital Markets',
            'Chemicals',
            'Civic & Social Organization',
            'Civil Engineering',
            'Commercial Real Estate',
            'Computer & Network Security',
            'Computer Games',
            'Computer Hardware',
            'Computer Networking',
            'Computer Software',
            'Construction',
            'Consumer Electronics',
            'Consumer Goods',
            'Consumer Services',
            'Cosmetics',
            'Dairy',
            'Defense & Space',
            'Design',
            'Education Management',
            'E-learning',
            'Electrical & Electronic Manufacturing',
            'Entertainment',
            'Environmental Services',
            'Events Services',
            'Executive Office',
            'Facilities Services',
            'Farming',
            'Financial Services',
            'Fine Art',
            'Fishery',
            'Food & Beverages',
            'Food Production',
            'Fundraising',
            'Furniture',
            'Gambling & Casinos',
            'Glass, Ceramics & Concrete',
            'Government Administration',
            'Government Relations',
            'Graphic Design',
            'Health, Wellness & Fitness',
            'Higher Education',
            'Hospital & Health Care',
            'Hospitality',
            'Human Resources',
            'Import & Export',
            'Individual & Family Services',
            'Industrial Automation',
            'Information Services',
            'Information Technology & Services',
            'Insurance',
            'International Affairs',
            'International Trade & Development',
            'Internet',
            'Investment Banking/Venture',
            'Investment Management',
            'Judiciary',
            'Law Enforcement',
            'Law Practice',
            'Legal Services',
            'Legislative Office',
            'Leisure & Travel',
            'Libraries',
            'Logistics & Supply Chain',
            'Luxury Goods & Jewelry',
            'Machinery',
            'Management Consulting',
            'Maritime',
            'Marketing & Advertising',
            'Market Research',
            'Mechanical or Industrial Engineering',
            'Media Production',
            'Medical Device',
            'Medical Practice',
            'Mental Health Care',
            'Military',
            'Mining & Metals',
            'Motion Pictures & Film',
            'Museums & Institutions',
            'Music',
            'Nanotechnology',
            'Newspapers',
            'Nonprofit Organization Management',
            'Oil & Energy',
            'Online Publishing',
            'Outsourcing/Offshoring',
            'Package/Freight Delivery',
            'Packaging & Containers',
            'Paper & Forest Products',
            'Performing Arts',
            'Pharmaceuticals',
            'Philanthropy',
            'Photography',
            'Plastics',
            'Political Organization',
            'Primary/Secondary',
            'Printing',
            'Professional Training',
            'Program Development',
            'Public Policy',
            'Public Relations',
            'Public Safety',
            'Publishing',
            'Railroad Manufacture',
            'Ranching',
            'Real Estate',
            'Recreational',
            'Facilities & Services',
            'Religious Institutions',
            'Renewables & Environment',
            'Research',
            'Restaurants',
            'Retail',
            'Security & Investigations',
            'Semiconductors',
            'Shipbuilding',
            'Sporting Goods',
            'Sports',
            'Staffing & Recruiting',
            'Supermarkets',
            'Telecommunications',
            'Textiles',
            'Think Tanks',
            'Tobacco',
            'Translation & Localization',
            'Transportation/Trucking/Railroad',
            'Utilities',
            'Venture Capital',
            'Veterinary',
            'Warehousing',
            'Wholesale',
            'Wine & Spirits',
            'Wireless',
            'Writing & Editing',
        ];

        return view('app.onboarding.business.create', [
            'categories' => $categories,
        ]);
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

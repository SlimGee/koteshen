<?php

namespace App\Providers;

use App\Models\Country;
use App\Models\Currency;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Spatie\Onboard\Facades\Onboard;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            return;
        }

        Route::bind('commentable', function (string $value) {
            try {
                return commentable($value);
            } catch (\Throwable $th) {
                abort(404);
            }
        });

        Route::bind('payable', function (string $value) {
            try {
                return payable($value);
            } catch (\Throwable $th) {
                abort(404);
            }
        });

        View::share('countries', Cache::remember('db-countries', 60 * 60 * 24 * 7, function () {
            return Country::all();
        }));

        View::share('currencies', Cache::remember('db-currencies', 60 * 60 * 24 * 7, function () {
            return Currency::all();
        }));

        View::share('categories', Cache::remember('db-categories', 60 * 60 * 24 * 7, function () {
            return [
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
        }));

        Gate::before(fn(User $user) => $user->hasRole('super admin') ? true : null);

        Onboard::addStep('Setup your business')
            ->link('/app/onboarding/business/create')
            ->cta('Create your first business')
            ->completeIf(function (User $model) {
                return $model->businesses()->exists();
            });
    }
}

<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CreatePrimaryBusiness extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:primary-business';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create primary business for the primary user of the application';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user = User::role('primary')->first();

        if (!$user) {
            $this->error('Primary user not found!');

            return;
        }

        if ($user->businesses()->where('is_primary', true)->exists()) {
            $this->info('Primary business already exists!');

            return;
            $this->call('permission:create-role', ['name' => 'super admin']);
            $this->call('permission:create-role', ['name' => 'super admin']);
        }

        $business = $user->businesses()->create([
            'name' => config('koteshen.primary.business.name'),
            'phone' => config('koteshen.primary.business.phone'),
            'website' => config('koteshen.primary.business.website'),
            'address' => config('koteshen.primary.business.address'),
            'city' => config('koteshen.primary.business.city'),
            'industry' => config('koteshen.primary.business.industry'),
            'country' => config('koteshen.primary.business.country'),
            'phone_country' => config('koteshen.primary.business.phone_country'),
            'logo' => asset('images/logo/koteshen_cropped.png'),
        ]);

        $business->is_primary = true;
        $business->save();
    }
}

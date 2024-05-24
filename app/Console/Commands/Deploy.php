<?php

namespace App\Console\Commands;

use App\Models\Business;
use App\Models\Client;
use App\Models\Comment;
use App\Models\Country;
use App\Models\Currency;
use App\Models\Estimate;
use App\Models\Invoice;
use App\Models\Item;
use App\Models\Payment;
use App\Models\User;
use FlixtechsLabs\LaravelAuthorizer\Facades\Authorizer;
use Illuminate\Console\Command;

class Deploy extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:deploy';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Setting up deployment for Laravel application...');
        $this->call('down');
        $this->info('migrating database...');
        $this->call('migrate');
        $this->info('Creating/updating default roles and permissions...');

        $this->call('permission:create-role', ['name' => 'super admin']);
        $this->call('permission:create-role', ['name' => 'primary']);

        $this->call('permission:create-role', [
            'name' => 'admin',
            'permissions' => implode('|', [
                ...Authorizer::getPermissionsFor(User::class),
                ...Authorizer::getPermissionsFor(Business::class),
            ]),
        ]);

        $this->call('permission:create-role', [
            'name' => 'user',
            'permissions' => implode('|', [
                'view app dashboard',
                'upload images',
                ...Authorizer::getPermissionsFor(Business::class),
                ...Authorizer::getPermissionsFor(Client::class),
                ...Authorizer::getPermissionsFor(Invoice::class),
                ...Authorizer::getPermissionsFor(Estimate::class),
                ...Authorizer::getPermissionsFor(Payment::class),
                ...Authorizer::getPermissionsFor(Comment::class),
                ...Authorizer::getPermissionsFor(Item::class),
            ]),
        ]);

        $this->call('permission:create-role', [
            'name' => 'client',
            'permissions' => implode('|', [
                'view self service portal',
            ]),
        ]);

        $this->call('permission:create-permission', [
            'name' => 'access app under development',
        ]);

        $this->call('permission:create-permission', [
            'name' => 'upload images',
        ]);

        if (Country::count() < 1) {
            $this->call('db:seed', ['class' => 'CountrySeeder']);
        }
        if (Currency::count() < 1) {
            $this->call('db:seed', ['class' => 'CurrencySeeder']);
        }

        $this->call(CreatePrimaryBusiness::class);
        $this->call(ConfigureSubscriptions::class);

        $this->info('Done! Application is now ready to be deployed.');
        $this->call('up');
    }
}

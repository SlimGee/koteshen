<?php

namespace App\Console\Commands;

use Flixtechs\Subby\Models\Plan;
use Illuminate\Console\Command;

class ConfigureSubscriptions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:configure-subscriptions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Configure the subscriptions for the application.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $plans = collect([
            [
                'plan' => [
                    'tag' => 'starter',
                    'name' => 'Starter',
                    'description' => 'For individuals and small businesses just getting started.',
                    'price' => 9.99,
                    'signup_fee' => 4.99,
                    'invoice_period' => 1,
                    'invoice_interval' => 'month',
                    'trial_period' => 15,
                    'trial_interval' => 'day',
                    'grace_period' => 1,
                    'grace_interval' => 'day',
                    'tier' => 1,
                    'currency' => 'USD',
                ],
                'features' => [
                    [
                        'tag' => 'clients',
                        'name' => 'Clients available',
                        'value' => 10,
                        'sort_order' => 1,
                    ],
                    [
                        'tag' => 'invoices',
                        'name' => 'Invoices available',
                        'value' => 15,
                        'sort_order' => 2,
                    ],
                    [
                        'tag' => 'estimates',
                        'name' => 'Estimates available',
                        'value' => true,
                        'sort_order' => 3,
                    ],
                    [
                        'tag' => 'tax_reports',
                        'name' => 'Tax reports',
                        'value' => true,
                    ],
                    [
                        'tag' => 'payment_gateways',
                        'name' => 'Get paid online',
                        'value' => true,
                    ],
                ],
            ],
            [
                'plan' => [
                    'tag' => 'business',
                    'name' => 'Business',
                    'description' => 'For established businesses looking to optimize.',
                    'price' => 29.99,
                    'signup_fee' => 14.99,
                    'invoice_period' => 1,
                    'invoice_interval' => 'month',
                    'trial_period' => 15,
                    'trial_interval' => 'day',
                    'grace_period' => 1,
                    'grace_interval' => 'day',
                    'tier' => 3,
                    'currency' => 'USD',
                ],
                'features' => [
                    [
                        'tag' => 'clients',
                        'name' => 'Clients available',
                        'value' => 60,
                        'sort_order' => 1,
                    ],
                    [
                        'tag' => 'invoices',
                        'name' => 'Invoices available',
                        'value' => true,
                        'sort_order' => 2,
                    ],
                    [
                        'tag' => 'estimates',
                        'name' => 'Estimates available',
                        'value' => true,
                        'sort_order' => 3,
                    ],
                    [
                        'tag' => 'recurring_invoices',
                        'name' => 'Recurring invoices',
                        'value' => true,
                        'sort_order' => 4,
                    ],
                    [
                        'tag' => 'reminders',
                        'name' => 'Payment reminders',
                        'value' => true,
                        'sort_order' => 5,
                    ],
                    [
                        'tag' => 'portal',
                        'name' => 'Client portal',
                        'value' => true,
                        'sort_order' => 6,
                    ],
                    [
                        'tag' => 'tax_reports',
                        'name' => 'Tax reports',
                        'value' => true,
                    ],
                    [
                        'tag' => 'payment_gateways',
                        'name' => 'Get paid online',
                        'value' => true,
                    ],
                ],
            ],
            [
                'plan' => [
                    'tag' => 'enterprise',
                    'name' => 'Enterprise',
                    'description' => 'For large businesses looking to innovate.',
                    'price' => 60,
                    'signup_fee' => 29.99,
                    'invoice_period' => 1,
                    'invoice_interval' => 'month',
                    'trial_period' => 15,
                    'trial_interval' => 'day',
                    'grace_period' => 1,
                    'grace_interval' => 'day',
                    'tier' => 4,
                    'currency' => 'USD',
                ],
                'features' => [
                    [
                        'tag' => 'clients',
                        'name' => 'Clients available',
                        'value' => true,
                        'sort_order' => 1,
                    ],
                    [
                        'tag' => 'invoices',
                        'name' => 'Invoices available',
                        'value' => true,
                        'sort_order' => 2,
                    ],
                    [
                        'tag' => 'estimates',
                        'name' => 'Estimates available',
                        'value' => true,
                        'sort_order' => 3,
                    ],
                    [
                        'tag' => 'recurring_invoices',
                        'name' => 'Recurring invoices',
                        'value' => true,
                        'sort_order' => 4,
                    ],
                    [
                        'tag' => 'reminders',
                        'name' => 'Payment reminders',
                        'value' => true,
                        'sort_order' => 5,
                    ],
                    [
                        'tag' => 'portal',
                        'name' => 'Client portal',
                        'value' => true,
                        'sort_order' => 6,
                    ],
                    [
                        'tag' => 'tax_reports',
                        'name' => 'Tax reports',
                        'value' => true,
                    ],
                    [
                        'tag' => 'payment_gateways',
                        'name' => 'Get paid online',
                        'value' => true,
                    ],
                    [
                        'tag' => 'white_label',
                        'name' => 'White-label branding',
                        'value' => true,
                    ],
                    [
                        'tag' => 'advanced_automation',
                        'name' => 'Advanced automation',
                        'value' => true,
                    ],
                ],
            ],
        ]);

        $plans->each(function ($plan) {
            $model = Plan::updateOrCreate(
                ['tag' => $plan['plan']['tag']],
                $plan['plan']
            );

            $model->features()->delete();
            $model->features()->createMany($plan['features']);
        });

        $this->info('Subscriptions configured successfully.');
    }
}
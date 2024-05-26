<?php

namespace App\Jobs;

use Flixtechs\Subby\Models\PlanSubscription;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\Middleware\WithoutOverlapping;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use InvalidArgumentException;

class SubscriptionRenewalPaymentJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $planSubscription;

    private $service;

    public $tries = 1;

    public $timeout = 120;

    /**
     * Create a new job instance.
     */
    public function __construct($planSubscriptionId)
    {
        $this->planSubscription = PlanSubscription::find($planSubscriptionId);

        $paymentMethod = config('subby.services.payment_methods.' . $this->planSubscription->payment_method);
        if (empty($paymentMethod)) {
            throw new InvalidArgumentException('Selected payment method does not exist', 401);
        }

        // Make service
        $this->service = app()->make($paymentMethod);

        // Set options from service constants
        $this->tries = $this->service::TRIES;
        $this->timeout = $this->service::TIMEOUT;
    }

    // Avoid overlapping jobs to avoid any double payment issues
    public function middleware()
    {
        return [(new WithoutOverlapping('subscription-payment-' . $this->planSubscription->id))->dontRelease()];
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this
            ->service
            ->subscription($this->planSubscription)
            ->amount($this->planSubscription->price)
            ->currency($this->planSubscription->currency)
            ->execute();
    }
}

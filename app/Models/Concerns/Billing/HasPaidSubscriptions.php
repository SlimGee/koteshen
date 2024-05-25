<?php

namespace App\Models\Concerns\Billing;

use Flixtechs\Subby\Models\Plan;

trait HasPaidSubscriptions
{
    public function subscribed(): bool
    {
        return $this->subscriptions->reject->isInactive()->isNotEmpty();
    }

    public function subscribe(Plan $plan, string $paymentMethod = 'credit_card')
    {
        if ($this->subscriptions()->count() === 0) {
            return $this->newSubscription(
                tag: 'main',
                planCombination: $plan,
                name: $plan->name,
                description: $plan->description,
                paymentMethod: $paymentMethod
            );
        }

        if ($this->subscription('main')->plan_id == $plan->id || $this->isSubscribedTo($plan->id)) {
            return $this->subscription()->renew();
        }

        return $this->subscription()->changePlan($plan);
    }
}

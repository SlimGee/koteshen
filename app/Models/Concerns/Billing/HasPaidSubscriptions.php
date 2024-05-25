<?php

namespace App\Models\Concerns\Billing;

use Flixtechs\Subby\Models\Plan;

trait HasPaidSubscriptions
{
    public function subscribed(): bool
    {
        return $this->subscriptions->reject->isInactive()->isNotEmpty();
    }

    public function subscribe(Plan $plan)
    {
        if ($this->subscriptions()->count() === 0) {
            return $this->newSubscription('main', $plan, $plan->description, $plan->description);
        }

        if ($this->subscription('main')->plan_id == $plan->id || $this->isSubscribedTo($plan->id)) {
            return $this->subscription()->renew();
        }

        return $this->subscription()->changePlan($plan);
    }
}

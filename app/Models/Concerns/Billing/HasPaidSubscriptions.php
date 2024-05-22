<?php

namespace App\Models\Concerns\Billing;

trait HasPaidSubscriptions
{
    public function subscribed(): bool
    {
        return $this->subscriptions->reject->isInactive()->isNotEmpty();
    }
}

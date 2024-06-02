<?php

namespace App\Transport\Pesepay;

use App\Models\Invoice;
use App\Models\User;
use App\Pipeline\SimpleTransport;

class PaymentTransport extends SimpleTransport
{
    protected array $details;

    protected User $user;

    protected Invoice $invoice;

    /**
     * @param  array<string, mixed>  $details
     */
    public function setDetails(array $details): self
    {
        $this->details = $details;

        return $this;
    }

    public function getDetails(): array
    {
        return $this->details;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setInvoice(Invoice $invoice): self
    {
        $this->invoice = $invoice;

        return $this;
    }

    public function getInvoice(): Invoice
    {
        return $this->invoice;
    }
}

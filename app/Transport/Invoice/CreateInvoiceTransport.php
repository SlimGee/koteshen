<?php

namespace App\Transport\Invoice;

use App\Models\Invoice;
use App\Pipeline\SimpleTransport;

class CreateInvoiceTransport extends SimpleTransport
{
    private Invoice $invoice;

    private $items;

    public function setItems($items)
    {
        $this->items = $items;

        return $this;
    }

    public function getItems()
    {
        return $this->items;
    }

    public function setInvoice(Invoice $invoice)
    {
        $this->invoice = $invoice;

        return $this;
    }

    public function getInvoice(): Invoice
    {
        return $this->invoice;
    }
}

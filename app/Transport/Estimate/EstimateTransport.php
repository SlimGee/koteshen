<?php

namespace App\Transport\Estimate;

use App\Models\Estimate;
use App\Pipeline\SimpleTransport;

class EstimateTransport extends SimpleTransport
{
    private Estimate $estimate;

    private $items;

    public function setEstimate(Estimate $estimate): self
    {
        $this->estimate = $estimate;

        return $this;
    }

    public function getEstimate()
    {
        return $this->estimate;
    }

    public function setItems($items): self
    {
        $this->items = $items;

        return $this;
    }

    public function getItems()
    {
        return $this->items;
    }
}

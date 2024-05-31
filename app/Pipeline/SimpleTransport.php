<?php

namespace App\Pipeline;

use App\Concerns\Makeable;
use App\Pipeline\Contracts\Transport;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Client\Request;

class SimpleTransport implements Transport
{
    use Makeable;

    private $request;

    public function setRequest(Request|FormRequest $request)
    {
        $this->request = $request;

        return $this;
    }

    public function getRequest(): Request|FormRequest
    {
        return $this->request;
    }
}

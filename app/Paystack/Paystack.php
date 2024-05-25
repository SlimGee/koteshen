<?php

namespace App\Paystack;

use Unicodeveloper\Paystack\Exceptions\IsNullException;
use Unicodeveloper\Paystack\Paystack as PaystackPaystack;

class Paystack extends PaystackPaystack
{
    /**
     * @param  string  $relativeUrl
     * @param  string  $method
     * @param  array  $body
     * @return Paystack
     *
     * @throws IsNullException
     */
    private function setHttpResponse($relativeUrl, $method, $body = [])
    {
        if (is_null($method)) {
            throw new IsNullException('Empty method not allowed');
        }

        $this->response = $this->client->{strtolower($method)}(
            $this->baseUrl . $relativeUrl,
            ['body' => json_encode($body)]
        );

        return $this;
    }

    public function chargeAuthorization(array $data)
    {
        array_map(function ($key) use ($data) {
            if (!array_key_exists($key, $data)) {
                throw new \InvalidArgumentException("The $key parameter is required");
            }
        }, ['email', 'amount', 'authorization_code']);

        $this->setHttpResponse('/transaction/charge_authorization', 'POST', $data);

        return $this;
    }

    /**
     * Get the whole response from a get operation
     *
     * @return array
     */
    public function getResponse()
    {
        return json_decode($this->response->getBody(), true);
    }
}

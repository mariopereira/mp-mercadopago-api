<?php

namespace mariopereira\MercadoPagoApi;

class Config
{
    private $data = [
        'clientId' => null,
        'clientSecret' => null,
        'publicKey' => null,
        'accessToken' => null,
        'sponsorId' => null,
        'sandbox' => false,
        'baseUrl' => 'https://api.mercadopago.com'
    ];

    /**
     * Get a value
     * @return mixed
     */
    public function get(string $key, $default = null)
    {
        return isset($this->data[$key]) ? $this->data[$key] : $default;
    }

    /**
     * Set a value
     * @param string $key Key to set
     * @param mixed $value
     */
    public function set(string $key, $value)
    {
        $this->data[$key] = $value;
    }
}

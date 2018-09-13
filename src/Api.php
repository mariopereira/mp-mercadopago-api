<?php

namespace mariopereira\MercadoPagoApi;

class Api
{
    /**
     * @var Config
     */
    protected static $config;

    /**
     * @var RestClient
     */
    protected static $restClient;

    /**
     * Initialize elements
     */
    public static function init()
    {
        if (!(self::$config instanceof Config)) {
            self::$config = new Config();
        }

        if (!(self::$restClient instanceof RestClient)) {
            self::$restClient = new RestClient();
        }
    }

    /**
     * Get configuration
     * @return \mpMercadoPagoApi\Config
     */
    public static function config() : Config
    {
        self::init();
        return self::$config;
    }

    /**
     * Get rest client
     * @return \mpMercadoPagoApi\RestClient
     */
    public static function restClient() : restClient
    {
        self::init();
        return self::$restClient;
    }
}

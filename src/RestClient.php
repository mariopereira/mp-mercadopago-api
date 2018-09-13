<?php

namespace mariopereira\MercadoPagoApi;

class RestClient
{
    /**
     * Content type json
     */
    const TYPE_JSON = 'application/json';

    /**
     * Call api
     * @param string $uri
     * @param string $method
     * @param array $data
     * @param string $contentType
     * @return array
     * @throws \Exception
     */
    private static function call(
        string $uri,
        string $method,
        array $data = null,
        string $contentType = null
    ) : array
    {
        $curl = curl_init($uri);
        curl_setopt($curl, CURLOPT_USERAGENT, 'MercadoPago Api v' . Version::API_VERSION);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Accept: application/json',
            'Content-Type: ' . $contentType
        ]);

        if (!empty($data)) {
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }

        $result = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        if (false === $result) {
            throw new \Exception(curl_error($curl));
        }

        $response = [
            'code' => $httpCode,
            'response' => json_decode($result, true)
        ];

        curl_close($curl);

        return $response;
    }

    /**
     * Make a get request
     * @param string $uri
     * @param string $contentType
     * @return array
     */
    public static function get(string $uri, string $contenType = self::TYPE_JSON) : array
    {
        return self::call($uri, 'GET', null, $contentType);
    }

    /**
     * Make a post request
     * @param string $uri
     * @param array $data
     * @param string $contentType
     * @return array
     */
    public static function post(string $uri, array $data, $contenType = self::TYPE_JSON) : array
    {
        return self::call($uri, 'POST', $data, $contentType);
    }

    /**
     * Make a put request
     * @param string $uri
     * @param array $data
     * @param string $contentType
     * @return array
     */
    public static function put(string $uri, array $data, $contenType = self::TYPE_JSON) : array
    {
        return self::call($uri, 'PUT', $data, $contentType);
    }

    /**
     * Make a delete request
     * @param string $uri
     * @param array $data
     * @param string $contentType
     * @return array
     */
    public static function delete(string $uri, array $data, $contenType = self::TYPE_JSON) : array
    {
        return self::call($uri, 'DELETE', $data, $contentType);
    }
}

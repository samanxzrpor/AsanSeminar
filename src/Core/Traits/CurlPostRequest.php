<?php

namespace Core\Traits;

trait CurlPostRequest
{

    public static function sendRequest($params)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"http://127.0.0.1:8001/api/shaparak");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,
            $params);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($ch);
        curl_close ($ch);
        return $server_output;
    }
}

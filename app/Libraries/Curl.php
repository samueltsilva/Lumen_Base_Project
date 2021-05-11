<?php

namespace App\Libraries;

class Curl
{
    public static function sendPost(string $url, string $dados)
    {
        $curl = new \Curl\Curl();
        $curl->setHeader('Content-Type', 'application/json');
        $curl->setOpt(CURLOPT_PROXY, '');
        $curl->setOpt(CURLOPT_TIMEOUT, 10);
        $curl->setOpt(CURLOPT_CONNECTTIMEOUT, 2);;
        $curl->post($url, $dados);
        return $curl->getResponse();
    }
}

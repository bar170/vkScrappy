<?php
namespace App\Lib;

use Illuminate\Support\Facades\Auth;

class Request
{
    private string $method;
    private $client_id;
    private $client_secret;
    private $version;

    public function __construct()
    {
        $this->setClientId('51452294');
        $this->setClientSecret('B0kGr2wHgM4JUQxj3DnN');
        $this->setVersion('5.131');
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function setMethod(string $method): void
    {
        $this->method = $method;
    }

    public function getClientId()
    {
        return $this->client_id;
    }

    public function setClientId($client_id): void
    {
        $this->client_id = $client_id;
    }

    public function getClientSecret()
    {
        return $this->client_secret;
    }

    public function setClientSecret($client_secret): void
    {
        $this->client_secret = $client_secret;
    }

    public function getVersion()
    {
        return $this->version;
    }

    public function setVersion($version): void
    {
        $this->version = $version;
    }

    public function send(string $url, array $params)
    {
        $fullPath = $url . '?' . http_build_query($params);
        $ch = curl_init($fullPath);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HEADER, false);
        $html = curl_exec($ch);
        curl_close($ch);

        $answer = json_decode($html,true);

        return $answer;
    }
}

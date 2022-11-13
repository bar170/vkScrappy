<?php
namespace App\Lib\Request;

use App\Lib\Request\Support\ListField;
use Illuminate\Support\Facades\Auth;
use App\Lib\Config;


class Request
{
    private string $method;
    private string $client_id;
    private string $client_secret;
    private string $version;
    private string $url;
    private string $fields;
    protected string $type;
    protected ListField $listField;

    public function __construct()
    {
        $this->setClientId(Config::getClientId());
        $this->setClientSecret(Config::getClientSecret());
        $this->setVersion(Config::getVersion());

        $this->setMethod('Не определен');
        $this->setUrl('https://api.vk.com/method/');
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function setMethod(string $method): void
    {
        $this->method = $method;
    }

    public function getClientId(): string
    {
        return $this->client_id;
    }

    public function setClientId($client_id): void
    {
        $this->client_id = $client_id;
    }

    public function getClientSecret(): string
    {
        return $this->client_secret;
    }

    public function setClientSecret($client_secret): void
    {
        $this->client_secret = $client_secret;
    }

    public function getVersion(): string
    {
        return $this->version;
    }

    public function setVersion($version): void
    {
        $this->version = $version;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl($url): void
    {
        $this->url = $url;
    }

    public function getFields(): string
    {
        return $this->fields;
    }

    public function setFields(string $fields): void
    {
        $this->fields = $fields;
    }

    /**
     * Добавить 1 поле
     * @param $field
     * @return void
     */
    public function addField($field): void
    {
        $add = $this->getFields() . ', ' . $field;
        $this->setFields($add);
    }

    /**
     * Добавить множество полей из массива
     * @param array $fields
     * @return void
     */
    public function addFields(array $fields)
    {
        foreach ($fields as $field) {
            $this->addField($field);
        }
    }


    public function send(array $params)
    {
        $url = $this->getUrl() . $this->getMethod();
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

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }
}

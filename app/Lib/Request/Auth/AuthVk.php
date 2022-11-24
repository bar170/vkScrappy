<?php
namespace App\Lib\Request\Auth;

use App\Lib\Request\Request;
use Illuminate\Support\Facades\Auth;


class AuthVk extends Request
{
    private $redirect_uri;
    private $urlCode;
    private $display;
    private $scope;
    private $responseType;


    public function __construct()
    {
        $this->setRedirectUri('http://www.vk-scrappy.loc/home/update_token');
        $this->setDisplay('page');
        $this->setScope('friends,groups,offline');
        $this->setResponseType('token');

        parent::__construct();

        $this->setUrl('https://oauth.vk.com/access_token');
        $this->setMethod('');
        $this->setUrlAuthorizationCodeFlow();

    }

    public function getDisplay()
    {
        return $this->display;
    }

    public function setDisplay($display): void
    {
        $this->display = $display;
    }

    public function getScope()
    {
        return $this->scope;
    }

    public function setScope($scope): void
    {
        $this->scope = $scope;
    }

    public function getResponseType()
    {
        return $this->responseType;
    }

    public function setResponseType($responseType): void
    {
        $this->responseType = $responseType;
    }

    public function getRedirectUri()
    {
        return $this->redirect_uri;
    }

    public function setRedirectUri($redirect_uri): void
    {
        $this->redirect_uri = $redirect_uri;
    }

    public function getUrlCode()
    {
        return $this->urlCode;
    }

    /**
     * Устанавливает ссылку для Implicit Flow
     *
     * @return void
     */
    public function setUrlCode(): void
    {
        $this->setResponseType('token');
        $url = 'https://oauth.vk.com/authorize?';
        $get = [
            'client_id'  => $this->getClientId(),
            'redirect_uri' => $this->getRedirectUri(),
            'display' => $this->getDisplay(),
            'scope' => $this->getScope(),
            'response_type' => $this->getResponseType(),
            'v' => $this->getVersion(),
        ];
        $url .= http_build_query($get);

        $this->urlCode = $url;

    }

    /**
     * Устанавливает ссылку для получения Authorization code flow
     *
     * @return void
     */
    public function setUrlAuthorizationCodeFlow(): void
    {

        $this->setResponseType('code');
        $url = 'https://oauth.vk.com/authorize?';
        $get = [
            'client_id'  => $this->getClientId(),
            'redirect_uri' => $this->getRedirectUri(),
            'display' => $this->getDisplay(),
            'scope' => $this->getScope(),
            'response_type' => $this->getResponseType(),
            'v' => $this->getVersion(),
        ];
        $url .= http_build_query($get);

        $this->urlCode = $url;

    }

    public function setRequest()
    {
        $this->request = new Request();
    }

    public function getRequest()
    {
        return $this->request;
    }


    public function setToken()
    {
        $get = [
            'client_id'  => $this->getClientId(),
            'client_secret' => $this->getClientSecret(),
            'redirect_uri' => $this->redirect_uri,
            'code' => Auth::user()->code,
        ];
        $answer = $this->send($get);

        if (isset($answer['access_token'])) {
            $token =  $answer['access_token'];
            Auth::user()->vktoken = $token;
            Auth::user()->save();
        } else {
            $token = $answer;
        }

        return $token;

    }

}

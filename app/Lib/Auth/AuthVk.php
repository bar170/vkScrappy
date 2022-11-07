<?php
namespace App\Lib\Auth;

use App\Lib\Request;
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
        $this->setScope('friends,groups,photos,wall');
        $this->setResponseType('code');

        parent::__construct();

        $this->setUrlCode();

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
        https://oauth.vk.com/authorize?client_id=51452294&redirect_uri=http://www.vk-scrappy.loc/home/update_token&display=page&scope=friends,groups,fave&response_type=token&v=5.131
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
        ];
        $url = 'https://oauth.vk.com/access_token';

        $answer = $this->send($url, $get);

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

<?php
namespace App\Lib\Friends;

use App\Lib\Request;
use Illuminate\Support\Facades\Auth;

class Friend extends Request
{

    public function __construct()
    {
        parent::__construct();

    }

    public function getFriends()
    {
        $url = 'https://api.vk.com/method/friends.get';

        $get = [
            'access_token' =>  Auth::user()->vktoken,
            'v' => $this->getVersion()
        ];

        $res = $this->send($url, $get);

        return $res;
    }
}

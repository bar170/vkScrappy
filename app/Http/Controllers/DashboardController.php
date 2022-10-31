<?php

namespace App\Http\Controllers;

use App\Lib\Auth\AuthVk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{

    public function getCode() {
    }

    public function index() {
        $context = [];

        return view('dashboard.dashboard', $context);
    }

    public function updateToken() {
        $context['token'] = 'Не определен';

        if (request()->filled('code')) {
            $code = request()->get('code');
            $request = new AuthVk();
            $token = $request->setToken();
            $context['code'] =  Auth::user()->code;
            $context['token'] =  Auth::user()->vktoken;

        } else {
            $context['error'] = 'Ошибка при получении кода';
        }

        return view('dashboard.update_token', $context);
    }

    //Заменить на константы
    public function setToken($code) {
        $get = array(
            'client_id'  => '51452294',
            'client_secret' => 'B0kGr2wHgM4JUQxj3DnN',
            'redirect_uri' => 'http://www.vk-scrappy.loc/home/update_token',
            'code' => $code
        );
        $url = 'https://oauth.vk.com/access_token?';

        $ch = curl_init($url . http_build_query($get));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HEADER, false);
        $html = curl_exec($ch);
        curl_close($ch);

        $token = json_decode($html,true);

        if (isset($token['access_token'])) {
            $token =  $token['access_token'];
            Auth::user()->code = $code;
            Auth::user()->vktoken = $token;
            Auth::user()->save();
        } else {
            $token = $html;
        }

        return $token;

    }
}

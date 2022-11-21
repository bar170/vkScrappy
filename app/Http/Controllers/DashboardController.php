<?php

namespace App\Http\Controllers;

use App\Lib\Request\Auth\AuthVk;
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
            Auth::user()->code = $code;
            Auth::user()->save();
            $request = new AuthVk();
            $token = $request->setToken();

            $context['code'] =  $code;
            $context['token'] =  $token;

        } else {
            $context['error'] = 'Ошибка при получении кода';
        }

        return view('dashboard.update_token', $context);
    }
}

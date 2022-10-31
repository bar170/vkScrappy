<?php

namespace App\Http\Controllers;

use App\Lib\Friends\Friend;
use Illuminate\Http\Request;

class Friends extends Controller
{

    public function listFriends()
    {
        $context = [];
        $friends = new Friend();
        $answer = $friends->getFriends();
        $context['count'] = $answer['response']['count'];
        $context['friends'] =  $answer['response']['items'];

        return view('dashboard.friends.list_friends', $context);
    }

}

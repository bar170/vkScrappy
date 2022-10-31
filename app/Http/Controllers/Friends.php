<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Friends extends Controller
{

    public function listFriends()
    {
        $context = [];
        return view('dashboard.friends.list_friends', $context);
    }

    public function getFriends()
    {

    }
}

<?php

namespace App\Http\Controllers;

use App\Lib\Friends\Friend;
use Illuminate\Http\Request;

class Friends extends Controller
{

    public function listFriends()
    {
        $context = [];

        return view('dashboard.friends.list_friends', $context);
    }

}

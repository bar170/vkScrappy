<?php
namespace App\Http\Controllers;

use App\Lib\Objects\User\UserItem;
use App\Lib\Request\Friends\FriendR;
use App\Lib\Objects\Contact;

class Friends extends Controller
{
    private FriendR $request;

    public function __construct()
    {
        $this->request = new FriendR();
    }

    public function getListFriends()
    {
        $response = $this->request->getFriends();
        $count = $response['response']['count'];
        $list = $response['response']['items'];
        $contacts = [];
        foreach ($list as $item) {
            $contact = new UserItem($item);
            $contacts[] = $contact;
        }

        $context['count'] = $count;
        $context['friends'] = $contacts;

        return view('dashboard.friends.list_friends', $context);
    }

}

<?php
namespace App\Http\Controllers;

use App\Lib\Front\Icon;
use App\Lib\Objects\User\UserItem;
use App\Lib\Request\Friends\FriendR;
use App\Lib\Objects\Contact;
use Illuminate\Http\Request;

class Friends extends Controller
{
    private FriendR $request;
    private Icon $icon;

    public function __construct()
    {
        $this->request = new FriendR();
        $this->icon = new Icon();
    }

    /**
     * Формирует страницу со списком друзей на основе запроса к api вк (friends.get)
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
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

    /**
     * Формирует страницу детального просмотра пользователя вк
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getDetailUser($id)
    {
        $response = $this->request->getUser($id, 100);
        $item = $response['response'][0];
        $contact = new UserItem($item);

        $followers = $this->request->getFollowers($id, 10, false);
        $icons = $this->getIcons($contact);

        $context = [
            'id' => $id,
            'item' => $contact,
            'followers' => $followers,
            'icons' => $icons,
        ];

        return view('dashboard.friends.detail_user', $context);
    }

    /**
     * Формирует страницу детального просмотра пользователя вк
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getDetailUserFromForm(Request $request)
    {

        if($request->has('idUser')) {
            $id = $request->input('idUser');
        } elseif ($request->has('domainUser')) {
            $id = $request->input('domainUser');
        }


        $res = $this->getDetailUser($id);


        return $res;
    }

    /**
     * Формирует массив состояний-иконок
     * @param UserItem $contact
     * @return array
     */
    private function getShortState(UserItem $contact) : array
    {
        $states = [];

        $stateOnline = $contact->getOnline();
        if ($stateOnline == 'онлайн') {
            $online = 'online';
        } else {
            $online = 'offline';
            $lastSeen = $contact->getLastSeenDate();
        }
        $states[] = $online;

        if ($lastSeen!= $contact->getUndefinedField()) {
            //Давность 30 суток
            $last = $contact->getRecently(30);
            if ($last == 'Недавно') {
                $recently  = 'recently';
            } else {
                $recently = 'long';
            }
        }

        if (isset($recently)) {
            $states[] = $recently;
        }


        return $states;
    }

    private function getIcons(UserItem $contact)
    {
        $states = $this->getShortState($contact);
        $icons = $this->icon->collectIcon($states);

        return $icons;
    }


}

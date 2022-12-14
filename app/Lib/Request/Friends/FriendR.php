<?php
namespace App\Lib\Request\Friends;

use App\Lib\Request\Request;
use App\Lib\Request\Support\ListField;
use Illuminate\Support\Facades\Auth;

class FriendR extends Request
{

    public function __construct()
    {
        parent::__construct();

        $this->setFields('');
        $this->setType('user');
        $this->listField = new ListField($this->type);

    }

    public function getFriends($weight = 100, bool $pure = false)
    {
        $this->setMethod('friends.get');
        $this->setFieldsByWeight($weight);

        if ($pure) {
            $this->clearAllFields();
        }

        $get = [
            'fields' => $this->getFields(),
            'access_token' =>  Auth::user()->vktoken,
            'v' => $this->getVersion()
        ];

        $res = $this->send($get);

        return $res;
    }

    public function getUser($id, $weight = 100, bool $pure = false)
    {
        $this->setMethod('users.get');

        $this->setFieldsByWeight($weight);

        if ($pure) {
            $this->clearAllFields();
        }

        $get = [
            'user_ids' => $id,
            'fields' => $this->getFields(),
            'access_token' =>  Auth::user()->vktoken,
            'v' => $this->getVersion()
        ];

        $res = $this->send($get);

        return $res;
    }

    /**
     * @param $id
     * @param bool $pure - при true запрос с минимальным количеством полей
     * @return mixed
     */
    public function getFollowers($id, $weight = 100, bool $pure = false)
    {
        $this->setMethod('users.getFollowers');
        $this->setFieldsByWeight($weight);

        if ($pure) {
            $this->clearAllFields();
        }

        $get = [
            'user_id' => $id,
            'fields' => $this->getFields(),
            'access_token' =>  Auth::user()->vktoken,
            'v' => $this->getVersion()
        ];

        $res = $this->send($get);

        return $res;
    }

    /**
     * Возвращает информацию о том, добавлен ли текущий пользователь в друзья у указанных пользователей.
     * 0 – пользователь не является другом;
     * 1 – отправлена заявка/подписка пользователю;
     * 2 – имеется входящая заявка/подписка от пользователя;
     * 3 – пользователь является другом.
     * @param $id
     * @return void
     */
    public function areFriends($id)
    {
        $this->setMethod('friends.areFriends');

        $get = [
            'user_ids' => $id,
            'access_token' =>  Auth::user()->vktoken,
            'v' => $this->getVersion()
        ];

        $res = $this->send($get);

        return $res;
    }
}

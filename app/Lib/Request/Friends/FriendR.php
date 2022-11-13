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

    // Добавить все возможные поля для friends.get
    public function addAllFields(): void
    {
        $allFields = $this->listField->getFieldsByWeight(100);
        $this->addFields($allFields);

    }

    public function getFriends()
    {
        $this->setMethod('friends.get');
        $this->addAllFields();

        $get = [
            'fields' => $this->getFields(),
            'access_token' =>  Auth::user()->vktoken,
            'v' => $this->getVersion()
        ];

        $res = $this->send($get);

        return $res;
    }
}

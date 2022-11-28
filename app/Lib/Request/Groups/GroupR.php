<?php
namespace App\Lib\Request\Groups;

use App\Lib\Request\Request;
use App\Lib\Request\Support\ListField;
use Illuminate\Support\Facades\Auth;

class GroupR extends Request
{
    public function __construct()
    {
        parent::__construct();

        $this->setFields('');
        $this->setType('group');
        $this->listField = new ListField($this->type);

    }

    public function getGroups($weight = 20, bool $pure = false)
    {
        $this->setMethod('groups.get');
        $this->setFieldsByWeight($weight);

        if ($pure) {
            $this->clearAllFields();
        }

        $get = [
            'fields' => $this->getFields(),
            'extended' => 1,
            'access_token' =>  Auth::user()->vktoken,
            'v' => $this->getVersion()
        ];

        $res = $this->send($get);

        return $res;
    }

    public function getGroup($id, $weight = 20, bool $pure = false)
    {
        $this->setMethod('groups.getById');
        $this->setFieldsByWeight($weight);

        if ($pure) {
            $this->clearAllFields();
        }

        $get = [
            'group_id' => $id,
            'fields' => $this->getFields(),
            'access_token' =>  Auth::user()->vktoken,
            'v' => $this->getVersion()
        ];

        $res = $this->send($get);

        return $res;
    }

}

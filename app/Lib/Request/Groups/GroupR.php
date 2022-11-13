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

    // Добавить все возможные поля для group.get
    public function addAllFields(): void
    {
        $allFields = $this->listField->getFieldsByWeight(11);
        $this->addFields($allFields);

    }

    public function getGroups()
    {
        $this->setMethod('groups.get');
        $this->addAllFields();

        $get = [
            'fields' => $this->getFields(),
            'extended' => 1,
            'access_token' =>  Auth::user()->vktoken,
            'v' => $this->getVersion()
        ];

        $res = $this->send($get);

        return $res;
    }
}

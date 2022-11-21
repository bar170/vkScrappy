<?php
namespace App\Lib\Objects\Group;

use App\Lib\Objects\Item;

class GroupItem extends Item
{
    //Базовые поля

    public function getName(): string
    {
        return $this->getField('name');
    }

    public function getScreenName(): string
    {
        return $this->getField('screen_name');
    }

    public function getIsClosed() : string
    {
        $res = $this->getField('is_closed');

        switch ($res) {
            case '0' :
                $res = 'Сообщество открытое';
                break;
            case '1' :
                $res = 'Сообщество закрытое';
                break;
            case '2' :
                $res = 'Сообщество частное';
                break;
        }
        return $res;
    }

    public function getState() : string
    {
        $res = $this->getField('deactivated');

        switch ($res) {
            case $this->getUndefinedField() :
                $res = 'Сообщество существует';
                break;
            case 'deleted' :
                $res = 'Сообщество удалено';
                break;
            case 'banned' :
                $res = 'Сообщество забанено';
                break;
        }
        return $res;
    }

    public function getIsAdmin() : string
    {
        $res = $this->getField('is_admin');

        switch ($res) {
            case '1' :
                $res = 'Вы админ';
                break;
            case '0' :
                $res = 'Вы не админ';
                break;
        }
        return $res;
    }

    public function getIsMember() : string
    {
        $res = $this->getField('is_member');

        switch ($res) {
            case '1' :
                $res = 'Состоите в обществе';
                break;
            case '0' :
                $res = 'Не состоите в обществе';
                break;
        }
        return $res;
    }

    public function geType(): string
    {
        $res = $this->getField('type');

        switch ($res) {
            case 'group' :
                $res = 'Группа';
                break;
            case 'page' :
                $res = 'Публичная страница';
                break;
            case 'event' :
                $res = 'Мероприятие';
                break;
        }

        return $res;
    }

    public function getPhoto50()
    {
        return $this->getField('photo_50');
    }

    public function getPhoto200()
    {
        return $this->getField('photo_200');
    }



}

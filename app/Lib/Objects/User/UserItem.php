<?php
namespace App\Lib\Objects\User;

use App\Lib\Objects\Item;

class UserItem extends Item
{

    public function getFirstName(): string
    {
        return $this->getField('first_name');
    }

    public function getLastName(): string
    {
        return $this->getField('last_name');
    }

    public function getIsClosed(): string
    {
        $res = $this->getField('is_closed');
        if ($res == '1') {
            $res = 'Закрытый профиль';
        }
        if ($res == '0') {
            $res = 'Открытый профиль';
        }
        return $res;
    }

    public function getCanAccessClosed(): string
    {
        $res = $this->getField('can_access_closed');
        if ($res == '1') {
            $res = 'Доступ к профилю есть';
        }
        if ($res == '0') {
            $res = 'Доступа к профилю нет';

        }
        return $res;
    }


    /**
     * Проверяет существует ли профиль
     *
     * @return bool
     */
    public function isDeactivated() : bool
    {
        $value = $this->getField('deactivated');
        if ($value  == 'Поля не существует') {
            $res = false;
        } else {
            $res = true;
        }
        return $res;
    }

    /**
     * Вернуть состояние профиля
     * существует / удален / забанен
     *
     * @return string
     */
    public function getState() : string
    {
        $res = $this->getField('deactivated');

        switch ($res) {
            case 'Поля не существует' :
                $res = 'Профиль существует';
                break;
            case 'deleted' :
                $res = 'Профиль удален';
                break;
            case 'banned' :
                $res = 'Профиль забанен';
                break;
        }
        return $res;
    }

    public function getSex() : string
    {
        $res = $this->getField('sex');
        switch ($res) {
            case '0' :
                $res = 'Пол не указан';
                break;
            case '1' :
                $res = 'Женский';
                break;
            case '2' :
                $res = 'Мужской';
                break;
        }
        return $res;
    }

    public function getStatus() : string
    {
        $res = $this->getField('status');
        return $res;
    }

    public function getVerified() : string
    {
        $res = $this->getField('verified');
        if ($res == '0') {
            $res = 'Страница не верифицирована';
        }
        if ($res == '1') {
            $res = 'Страница верифицирована';
        }

        return $res;
    }

    /**
     * Режим стены по умолчанию
     * @return string
     */
    public function getWallDefault() : string
    {
        $res = $this->getField('wall_default');

        switch ($res) {
            case 'owner' :
                $res = 'Только пользователь';
                break;
            case 'null' :
                $res = 'Никто';
                break;
            case 'all' :
                $res = 'Все';
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

    public function getOnline() : string
    {
        $value = $this->getField('online');
        $res = 'оффлайн';

        if ($value == '1') {
            $res = 'онлайн';
        }
        return $res;
    }

    /**
     * Вернуть платформу последнего посещения вк
     * @return string
     */
    public function getLastPlatform() : string
    {
        $value = $this->getField('last_seen');
        if ($value != 'Поля не существует') {

            switch ($value['platform']) {
                case '1' :
                    $platform = 'мобильная версия';
                    break;
                case '2' :
                    $platform = 'приложение для iPhone';
                    break;
                case '3' :
                    $platform = 'приложение для iPad';
                    break;
                case '4' :
                    $platform = 'приложение для Android';
                    break;
                case '5' :
                    $platform = 'приложение для Windows Phone';
                    break;
                case '6' :
                    $platform = 'приложение для Windows 10';
                    break;
                case '7' :
                    $platform = 'полная версия сайта';
                    break;
            }
            $res = $platform;
        } else {
            $res = $value;
        }

        return $res;
    }

    /**
     * Вернуть время последнего посещения вк
     * @return string
     */
    public function getLastSeen() : string
    {
        $res = $this->getField('last_seen');
        if ($res != 'Поля не существует') {
            $time = $res['time'];
            $res = date('Y-m-d H:i:s', $time);

        }
        return $res;
    }

}

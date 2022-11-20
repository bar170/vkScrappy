<?php
namespace App\Lib\Objects\User;

use App\Lib\Objects\Item;
use DateTimeImmutable;

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
        if ($value  == self::UNDEFINED_FIELD) {
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
            case self::UNDEFINED_FIELD :
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
        $res = ($res != '' ) ? $res : self::UNDEFINED_FIELD;
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
        if ($value != self::UNDEFINED_FIELD) {

            switch ($value['platform']) {
                case '1' :
                    $platform = 'Мобильная версия';
                    break;
                case '2' :
                    $platform = 'Приложение для iPhone';
                    break;
                case '3' :
                    $platform = 'Приложение для iPad';
                    break;
                case '4' :
                    $platform = 'Приложение для Android';
                    break;
                case '5' :
                    $platform = 'Приложение для Windows Phone';
                    break;
                case '6' :
                    $platform = 'Приложение для Windows 10';
                    break;
                case '7' :
                    $platform = 'Полная версия сайта';
                    break;
            }
            $res = $platform;
        } else {
            $res = $value;
        }

        return $res;
    }

    /**
     * Вернуть дату последнего посещения вк
     * @return string
     */
    public function getLastSeenDate() : string
    {
        $res = $this->getField('last_seen');
        if ($res != self::UNDEFINED_FIELD) {
            $time = $res['time'];
            $res = date('d-M-Y', $time);

        }
        return $res;
    }

    /**
     * Вернуть Недавно или Давно был пользователь онлайн
     * @param $lastSeen - количество суток после которых считается "давно"
     * @return string
     */
    public function getRecently($lastSeen) : string
    {
        $res = $this->getField('last_seen');
        if ($res != self::UNDEFINED_FIELD) {
            $date = $res['time'];
            $now = new DateTimeImmutable();
            $now = $now->getTimestamp();
            $long = $now - ($lastSeen * 24 * 60 * 60);
            if ($date < $long) {
                $res = 'Давно';
            } else {
                $res = 'Недавно';
            }

        }
        return $res;
    }

    /**
     * Вернуть время последнего посещения вк
     * @return string
     */
    public function getLastSeenTime() : string
    {
        $res = $this->getField('last_seen');
        if ($res != self::UNDEFINED_FIELD) {
            $time = $res['time'];
            $res = date('H:i:s', $time);

        }
        return $res;
    }

    public function getAbout() : string
    {
        return $this->getField('about');
    }

    /**
     * Содержимое поля «Деятельность» из профиля
     * @return string
     */
    public function getActivities() : string
    {
        return $this->getField('activities');
    }

    /**
     * Дата рождения. Возвращается в формате D.M.YYYY или D.M (если год рождения скрыт). Если дата рождения скрыта целиком, поле отсутствует в ответе.
     * @return string
     */
    public function getBDate() : string
    {
        return $this->getField('bdate');
    }

    /**
     * Информация о том, находится ли текущий пользователь в черном списке
     * @return string
     */
    public function getIsBlacklisted() : string
    {
        $res = $this->getField('blacklisted');
        switch ($res) {
            case '1' :
                $res = 'Вы в ЧС у пользователя';
                break;
            case '0' :
                $res = 'Вы не в ЧС';
                break;
        }
        return $res;
    }

    public function getIsBlacklistedByMe() : string
    {
        $res = $this->getField('blacklisted_by_me');
        switch ($res) {
            case '1' :
                $res = 'Пользователь у вас в ЧС';
                break;
            case '0' :
                $res = 'Пользователь у вас не в ЧС';
                break;
        }
        return $res;
    }

    /**
     * Информация о том, может ли текущий пользователь оставлять записи на стене.
     * @return string
     */
    public function getCanPost() : string
    {
        $res = $this->getField('can_post');
        switch ($res) {
            case '1' :
                $res = 'Возможно оставить пост на стене';
                break;
            case '0' :
                $res = 'Невозможно оставить пост на стене';
                break;
        }
        return $res;
    }

    /**
     * Информация о том, может ли текущий пользователь видеть чужие записи на стене.
     * @return string
     */
    public function getCanSeeAllPosts() : string
    {
        $res = $this->getField('can_see_all_posts');
        switch ($res) {
            case '1' :
                $res = 'Вам видны чужие записи на стене';
                break;
            case '0' :
                $res = 'Вам не видны чужие записи на стене';
                break;
        }
        return $res;
    }

    /**
     * Информация о том, может ли текущий пользователь видеть аудиозаписи.
     * @return string
     */
    public function getCanSeeAudio() : string
    {
        $res = $this->getField('can_see_audio');
        switch ($res) {
            case '1' :
                $res = 'Вам видны аудиозаписи';
                break;
            case '0' :
                $res = 'Вам не видны аудиозаписи';
                break;
        }
        return $res;
    }

    /**
     * Информация о том, будет ли отправлено уведомление пользователю о заявке в друзья от текущего пользователя
     * @return string
     */
    public function getCanSendFriendRequest() : string
    {
        $res = $this->getField('can_send_friend_request');
        switch ($res) {
            case '1' :
                $res = 'Уведомление будет отправлено';
                break;
            case '0' :
                $res = 'Уведомление не будет отправлено';
                break;
        }
        return $res;
    }

    /**
     * Информация о том, может ли текущий пользователь отправить личное сообщение.
     * @return string
     */
    public function getCanWritePrivateMessage() : string
    {
        $res = $this->getField('can_write_private_message');
        switch ($res) {
            case '1' :
                $res = 'Можно отправить ЛС';
                break;
            case '0' :
                $res = 'Нельзя отправить ЛС';
                break;
        }
        return $res;
    }

    /**
     * Информация о городе, указанном на странице пользователя в разделе «Контакты»
     * @return string
     */
    public function getCity() : string
    {
        $res = $this->getField('city');
        $city = (isset($res['title'])) ? $res['title'] : self::UNDEFINED_FIELD;

        return $city;
    }

    /**
     * Количество общих друзей с текущим пользователем
     * @return string
     */
    public function getCommonCount() : string
    {
        $res = $this->getField('common_count');

        return (string) $res;
    }

    public function getSkype() : string
    {
        $res = $this->getField('skype');

        return $res;
    }

    public function getSite() : string
    {
        $res = $this->getField('site');

        if ($res == '') {
            $res = self::UNDEFINED_FIELD;
        }

        return $res;
    }

    /**
     * Возвращается строка, содержащая короткий адрес страницы (например, andrew).
     * Если он не назначен, возвращается "id"+user_id, например, id35828305
     * @return string
     */
    public function getDomain() : string
    {
        $res = $this->getField('domain');
        return $res;
    }

    /**
     * Информация о карьере пользователя. Объект, содержащий следующие поля:
     * group_id (integer) — идентификатор сообщества (если доступно, иначе company);
     * company (string) — название компании (если доступно, иначе group_id);
     * country_id (integer) — идентификатор страны;
     * city_id (integer) — идентификатор города (если доступно, иначе city_name);
     * city_name (string) — название города (если доступно, иначе city_id);
     * from (integer) — год начала работы;
     * until (integer) — год окончания работы;
     * position (string) — должность.
     */
    public function getCareer()
    {
        $res = $this->getField('career');
        if ($res != self::UNDEFINED_FIELD) {
            if (count($res) < 1) {
                $res[0]['company'] = 'Информация была удалена';
                $res[0]['position'] = 'Информация была удалена';
            }
        }
        // Вернуть только 1 место работы
        return $res[0];
    }

    /**
     * Название компании
     * @return string
     */
    public function getCompany() : string
    {
        $res = $this->getCareer();
        $company =  (isset($res['company'])) ? $res['company'] : self::UNDEFINED_FIELD;
        return $company;
    }

    /**
     * Город в которой расположена компания
     * @return string
     */
    public function getCityName() : string
    {
        $res = $this->getCareer();
        $res =  (isset($res['city_name'])) ? $res['city_name'] : self::UNDEFINED_FIELD;
        return (string) $res;
    }

    /**
     * Должность
     * @return string
     */
    public function getPosition() : string
    {
        $res = $this->getCareer();
        $res =  (isset($res['position'])) ? $res['position'] : self::UNDEFINED_FIELD;
        return (string) $res;
    }

    /**
     * Год начала работы
     * @return string
     */
    public function getCareerFrom() : string
    {
        $res = $this->getCareer();
        $res =  (isset($res['from'])) ? $res['from'] : self::UNDEFINED_FIELD;
        return (string)  $res;
    }

    /**
     * Год окончания работы;
     * @return string
     */
    public function getCareerUntil() : string
    {
        $res = $this->getCareer();
        $res =  (isset($res['until'])) ? $res['until'] : self::UNDEFINED_FIELD;
        return (string) $res;
    }

    /**
    Информация об образовании
     */
    public function getOccupation()
    {
        $res = $this->getField('occupation');
        if ($res != self::UNDEFINED_FIELD) {
            if (count($res) < 1) {
                $res['name'] = 'Информация была удалена';
                $res['type'] = 'Информация была удалена';
            }
        }
        return $res;
    }

    /**
     * Название университета
     * @return string
     */
    public function getOccupationName() : string
    {
        $res = $this->getOccupation();
        $res =  (isset($res['name'])) ? $res['name'] : self::UNDEFINED_FIELD;
        return (string) $res;
    }

    /**
     * Название факультета
     * @return string
     */
    public function getOccupationType() : string
    {
        $res = $this->getOccupation();
        $res =  (isset($res['type'])) ? $res['type'] : self::UNDEFINED_FIELD;
        return (string) $res;
    }

    /**
     * Год окончания
     * @return string
     */
    public function getGraduationYear() : string
    {
        $res = $this->getOccupation();
        $res =  (isset($res['graduate_year'])) ? $res['graduate_year'] : self::UNDEFINED_FIELD;
        return (string) $res;
    }


    public function getFollowersCount() : string
    {
        $res = $this->getField('followers_count');

        return (string) $res;
    }

}

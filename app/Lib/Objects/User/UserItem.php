<?php
namespace App\Lib\Objects\User;

use App\Lib\Objects\Item;
use App\Lib\Objects\Entity\User\CounterEntity;
use App\Lib\Objects\Entity\User\OccupationEntity;
use App\Lib\Request\Friends\FriendR;
use DateTimeImmutable;

class UserItem extends Item
{

    private $followers;
    private $areFreinds;
    private CounterEntity $counters;
    private OccupationEntity $occupation;

    public function __construct(array $item, bool $isFull = false)
    {
        parent::__construct($item);

        // Создавать дополнительные запросы к апи вк только для детального просмотра
        if ($isFull) {
            $this->request = new FriendR();
            $this->setFollowers();
            $this->setAreFriends();
            $this->setCounters();
            $this->setOccupation();
        }

    }

    private function setFollowers()
    {
        $followers = $this->request->getFollowers($this->getId(), 10, false);
        if (isset($followers['error'])) {
            $this->followers = ['count' => $this->getUndefinedField()];
        } else {
            $this->followers = $followers['response'];
        }

    }

    /**
     * Установить счетчики
     * @return void
     */
    private function setCounters() : void
    {
        $entity = $this->getField('counters');
        $this->counters = new CounterEntity($entity);
    }

    private function setOccupation() : void
    {
        $entity = $this->getField('occupation');
        $this->occupation = new OccupationEntity($entity);
    }

    public function getCountFollowers()
    {
        return $this->followers['count'];
    }

    private function setAreFriends()
    {
        $areFriends = $this->request->areFriends($this->getId());
        if (isset($areFriends['error'])) {
            $friendStatus = $this->getUndefinedField();
        } else {
            $friendStatus = $areFriends['response'][0]['friend_status'];
        }

        $this->areFreinds = $friendStatus;
    }

    public function getAreFriends()
    {
        return $this->areFreinds;
    }

    public function getStateAreFriends(): string
    {
        $friendStatus = '';

        switch ($this->areFreinds) {
            case 0 :
                $friendStatus = 'Не друзья';
                break;
            case 1 :
                $friendStatus = 'Подписка от вас';
                break;
            case 2 :
                $friendStatus = 'Подписка на вас';
                break;
            case 3 :
                $friendStatus = 'Друг';
                break;
        }

        return $friendStatus;
    }

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
        if ($value  == $this->getUndefinedField()) {
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
            case $this->getUndefinedField() :
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
        $res = ($res != '' ) ? $res : $this->getUndefinedField();
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
        if ($value != $this->getUndefinedField()) {

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
        if ($res != $this->getUndefinedField()) {
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
        if ($res != $this->getUndefinedField()) {
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
        if ($res != $this->getUndefinedField()) {
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
     * Информация о том, есть ли на странице пользователя «огонёк».
     * @return string
     */
    public function getTrending() : string
    {
        $res = $this->getField('trending');
        switch ($res) {
            case '1' :
                $res = 'Да';
                break;
            case '0' :
                $res = 'Нет';
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
        $city = (isset($res['title'])) ? $res['title'] : $this->getUndefinedField();

        return $city;
    }

    /**
     * Информация о стране, указанном на странице пользователя в разделе «Контакты»
     * @return string
     */
    public function getCountry() : string
    {
        $res = $this->getField('country');
        $city = (isset($res['title'])) ? $res['title'] : $this->getUndefinedField();

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
            $res = $this->getUndefinedField();
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
     * Информация о том, известен ли номер мобильного телефона пользователя.
     * Возвращаемые значения: 1 — известен, 0 — не известен.
     * @return string
     */
    public function getHasMobile() : string
    {
        $res = $this->getField('has_mobile');
        if ($res == 1) {
            $res = 'Известен';
        } else {
            $res = 'Не известен';
        }
        return $res;
    }

    /**
     * Информация о том, установил ли пользователь фотографию для профиля.
     * Возвращаемые значения: 1 — установил, 0 — не установил.
     * @return string
     */
    public function getHasPhoto() : string
    {
        $res = $this->getField('has_photo');
        if ($res == 1) {
            $res = 'Установил';
        } else {
            $res = 'Не установил';
        }
        return $res;
    }

    /**
     * Название родного города.
     * @return string
     */
    public function getHomeTown() : string
    {
        $res = $this->getField('home_town');
        return $res;
    }

    /**
     * Содержимое поля «Интересы» из профиля
     * @return string
     */
    public function getInterests() : string
    {
        $res = $this->getField('interests');
        return $res;
    }

    /**
     * Любимые цитаты.
     * @return string
     */
    public function getQuotes() : string
    {
        $res = $this->getField('quotes');
        return $res;
    }

    /**
     * Информация о том, есть ли пользователь в закладках у текущего пользователя. Возможные значения:
     * 1 — есть;
     * 0 — нет.
     * @return string
     */
    public function getIsFavorite() : string
    {
        $res = $this->getField('is_favorite');
        if ($res == 1) {
            $res = 'В закладках';
        } elseif ($res == 0) {
            $res = 'Не в закладках';
        }
        return $res;
    }

    /**
     * Информация о том, скрыт ли пользователь из ленты новостей текущего пользователя. Возможные значения:
     * 1 — да;
     * 0 — нет.
     * @return string
     */
    public function getIsHiddenFromFeed() : string
    {
        $res = $this->getField('is_hidden_from_feed');
        if ($res == 1) {
            $res = 'Да';
        } elseif ($res == 0) {
            $res = 'Нет';
        }
        return $res;
    }

    /**
     * Индексируется ли профиль поисковыми сайтами. Возможные значения::
     * 1 — профиль скрыт от поисковых сайтов
     * 0 — профиль доступен поисковым сайтам. (В настройках приватности: https://vk.com/settings?act=privacy, в пункте «Кому в интернете видна моя страница», выбрано значение «Всем»).
     * @return string
     */
    public function getIsNoIndex() : string
    {
        $res = $this->getField('is_no_index');
        if ($res == 1) {
            $res = 'Скрыт';
        } elseif ($res == 2) {
            $res = 'Доступен';
        }
        return $res;
    }

    /**
     * Девичья фамилия.
     * @return string
     */
    public function getMaidenName() : string
    {
        $res = $this->getField('maiden_name');
        return $res;
    }

    public function getMovies() : string
    {
        $res = $this->getField('movies');
        return $res;
    }

    public function getMusic() : string
    {
        $res = $this->getField('music');
        return $res;
    }

    /**
     * Любимые телешоу.
     * @return string
     */
    public function getTv() : string
    {
        $res = $this->getField('tv');
        return $res;
    }

    /**
     * Никнейм (отчество) пользователя.
     * @return string
     */
    public function getNickname() : string
    {
        $res = $this->getField('nickname');
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
        if ($res != $this->getUndefinedField()) {
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
        $company =  (isset($res['company'])) ? $res['company'] : $this->getUndefinedField();
        return $company;
    }

    /**
     * Город в которой расположена компания
     * @return string
     */
    public function getCityName() : string
    {
        $res = $this->getCareer();
        $res =  (isset($res['city_name'])) ? $res['city_name'] : $this->getUndefinedField();
        return (string) $res;
    }

    /**
     * Должность
     * @return string
     */
    public function getPosition() : string
    {
        $res = $this->getCareer();
        $res =  (isset($res['position'])) ? $res['position'] : $this->getUndefinedField();
        return (string) $res;
    }

    /**
     * Год начала работы
     * @return string
     */
    public function getCareerFrom() : string
    {
        $res = $this->getCareer();
        $res =  (isset($res['from'])) ? $res['from'] : $this->getUndefinedField();
        return (string)  $res;
    }

    /**
     * Год окончания работы;
     * @return string
     */
    public function getCareerUntil() : string
    {
        $res = $this->getCareer();
        $res =  (isset($res['until'])) ? $res['until'] : $this->getUndefinedField();
        return (string) $res;
    }


    public function getOccupation() : OccupationEntity
    {
        return $this->occupation;
    }

    public function getCounters() : CounterEntity
    {
        return $this->counters;
    }

}

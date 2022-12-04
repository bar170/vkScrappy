<?php
namespace App\Lib\Objects\Group;


use App\Lib\Objects\Item;
use App\Lib\Objects\Entity\Group\AddressesEntity;
use App\Lib\Objects\Entity\Group\BanInfoEntity;
use App\Lib\Objects\Entity\Group\ContactsEntity;
use App\Lib\Objects\Entity\Group\CounterEntity;
use App\Lib\Objects\Entity\Group\MemberStatusEntity;

class GroupItem extends Item
{

    private AddressesEntity $addressesEntity;
    private BanInfoEntity $banInfoEntity;
    private ContactsEntity $contactsEntity;
    private CounterEntity $counterEntity;
    private MemberStatusEntity $memberStatusEntity;

    public function __construct(array $item, bool $isFull = false)
    {
        parent::__construct($item);

        // Создавать дополнительные запросы к апи вк только для детального просмотра
        if ($isFull) {
            $this->setAddresses();
            $this->setBanEntity();
            $this->setContactsEntity();
            $this->setCounterEntity();
            $this->setMemberStatusEntity();
        }

    }

    /**
     * Определить сущность Адреса
     * @return void
     */
    private function setAddresses() : void
    {
        $entity = $this->getField('addresses');
        $this->addressesEntity = new AddressesEntity($entity);
    }

    /**
     * Определить сущность Бана
     * @return void
     */
    private function setBanEntity(): void
    {
        $entity = $this->getField('ban_info');
        $this->banInfoEntity = new BanInfoEntity($entity);
    }

    /**
     * Определить сущность Контактов
     * @return void
     */
    private function setContactsEntity(): void
    {
        $entity = $this->getField('contacts');
        $this->contactsEntity = new ContactsEntity($entity);
    }

    /**
     * Определить сущность Счетчики
     * @return void
     */
    private function setCounterEntity(): void
    {
        $entity = $this->getField('counters');
        $this->counterEntity = new CounterEntity($entity);
    }

    /**
     * Определить сущность Статуса участника
     * @return void
     */
    private function setMemberStatusEntity(): void
    {
        $entity = $this->getField('member_status');
        $this->memberStatusEntity = new MemberStatusEntity($entity);
    }

    /**
     ** ГЕТТЕРЫ СУЩНОСТЕЙ **
     */

    public function getAddressesEntity() : AddressesEntity
    {
        return $this->addressesEntity;
    }

    public function getBanInfoEntity() : BanInfoEntity
    {
        return $this->banInfoEntity;
    }

    public function getContactsEntity() : ContactsEntity
    {
        return $this->contactsEntity;
    }

    public function getCountersEntity() : CounterEntity
    {
        return $this->counterEntity;
    }

    public function getMemberStatusEntity() : MemberStatusEntity
    {
        return $this->memberStatusEntity;
    }

    /**
     ** БАЗОВЫЕ ПОЛЯ **
     */

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
                $res = 'Сообщество заблокировано';
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

    /**
     * Возрастное ограничение
     * @return string
     */
    public function getAgeLimit() : string
    {
        $res = $this->getField('age_limits');

        switch ($res) {
            case '1' :
                $res = 'Нет';
                break;
            case '2' :
                $res = '16+';
                break;
            case '3' :
                $res = '18+';
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

    /**
     * Информация о том, может ли текущий пользователь создать новое обсуждение в группе. Возможные значения:
     * @return string
     */
    public function getCanCreateTopic() : string
    {
        $res = $this->getField('can_create_topic');

        switch ($res) {
            case '1' :
                $res = 'Может';
                break;
            case '0' :
                $res = 'Не может';
                break;
        }
        return $res;
    }

    /**
     * Информация о том, может ли текущий пользователь написать сообщение сообществу
     * @return string
     */
    public function getCanMessage() : string
    {
        $res = $this->getField('can_message');

        switch ($res) {
            case '1' :
                $res = 'Может';
                break;
            case '0' :
                $res = 'Не может';
                break;
        }
        return $res;
    }

    /**
     * Информация о том, может ли текущий пользователь оставлять записи на стене сообщества
     * @return string
     */
    public function getCanPost() : string
    {
        $res = $this->getField('can_post');

        switch ($res) {
            case '1' :
                $res = 'Может';
                break;
            case '0' :
                $res = 'Не может';
                break;
        }
        return $res;
    }

    /**
     * Информация о том, разрешено ли видеть чужие записи на стене группы
     * @return string
     */
    public function getCanSeeAllPosts() : string
    {
        $res = $this->getField('can_see_all_posts');

        switch ($res) {
            case '1' :
                $res = 'Может';
                break;
            case '0' :
                $res = 'Не может';
                break;
        }
        return $res;
    }

    /**
     * Информация о том, может ли текущий пользователь загружать видеозаписи в группу
     * @return string
     */
    public function getCanUploadVideos() : string
    {
        $res = $this->getField('can_upload_video');

        switch ($res) {
            case '1' :
                $res = 'Может';
                break;
            case '0' :
                $res = 'Не может';
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

    /**
     * Город, указанный в информации о сообществе.
     * @return string
     */
    public function getCity() : string
    {
        $res = $this->getField('city');
        $city = (isset($res['title'])) ? $res['title'] : $this->getUndefinedField();

        return $city;
    }

    /**
     * Страна, указанная в информации о сообществе
     * @return string
     */
    public function getCountry() : string
    {
        $res = $this->getField('country');
        $city = (isset($res['title'])) ? $res['title'] : $this->getUndefinedField();

        return $city;
    }

    /**
     * Текст описания сообщества.
     * @return string
     */
    public function getDescriptions() : string
    {
        $res = $this->getField('description');

        return $res;
    }

    /**
     * Идентификатор закрепленной записи. Получить дополнительные данные о записи можно методом wall.getById, передав в поле posts {group_id}{post_id}
     * @return string
     */
    public function getFixedPost() : string
    {
        $res = $this->getField('fixed_post');

        return $res;
    }

    /**
     * Количество участников в сообществе
     * @return string
     */
    public function getMembersCount() : string
    {
        $res = $this->getField('members_count');

        return $res;
    }

    /**
     * Возвращается для публичных страниц. Текст описания для поля start_date
     * @return string
     */
    public function getPublicDateLabel() : string
    {
        $res = $this->getField('public_date_label');

        return $res;
    }

    /**
     * Адрес сайта из поля «веб-сайт» в описании сообщества.
     * @return string
     */
    public function getSite() : string
    {
        $res = $this->getField('site');

        return $res;
    }

    /**
     * Статус сообщества.
     * @return string
     */
    public function getStatus() : string
    {
        $res = $this->getField('status');

        return $res;
    }

    /**
     * Информация о том, установлена ли у сообщества главная фотография.
     * @return string
     */
    public function getHasPhoto() : string
    {
        $res = $this->getField('has_photo');
        if ($res == 1) {
            $res = 'Установлена';
        } else {
            $res = 'Не установлена';
        }
        return $res;
    }

    /**
     * Информация о том, находится ли сообщество в закладках у текущего пользователя
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
     * Информация о том, скрыто ли сообщество из ленты новостей текущего пользователя
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
     * Информация о том, заблокированы ли сообщения от этого сообщества (для текущего пользователя).
     * @return string
     */
    public function getIsMessagesBlocked() : string
    {
        $res = $this->getField('is_messages_blocked');
        if ($res == 1) {
            $res = 'Да';
        } elseif ($res == 0) {
            $res = 'Нет';
        }
        return $res;
    }

    /**
     * Информация о том, есть ли у сообщества «огонёк».
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
     * Стена. Возможные значения:
     * 0 — выключена;
     * 1 — открытая;
     * 2 — ограниченная;
     * 3 — закрытая.
     * @return string
     */
    public function getWall() : string
    {
        $res = $this->getField('wall');
        switch ($res) {
            case '0' :
                $res = 'выключена';
                break;
            case '1' :
                $res = 'открытая';
                break;
            case '2' :
                $res = 'ограниченная';
                break;
            case '3' :
                $res = 'закрытая';
                break;
        }
        return $res;
    }

    /**
     * Информация о том, верифицировано ли сообщество
     * @return string
     */
    public function getVerified() : string
    {
        $res = $this->getField('verified');
        if ($res == '1') {
            $res = 'Верифицировано';
        }
        if ($res == '0') {
            $res = 'Не верифицировано';
        }

        return $res;
    }

}

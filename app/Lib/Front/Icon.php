<?php
namespace App\Lib\Front;


use App\Lib\Objects\User\UserItem;

/**
 * Класс для работы с иконками
 */
class Icon
{
    protected array $listIcon;

    public function __construct()
    {
        $this->setListIcon();
    }

    /**
     * Устанавливает массив соответствия. Под ключом иконка и поясняющий текст
     * @return void
     */
    private function setListIcon(): void
    {
        $list = [
            'online' => ['fas fa-signal text-success', 'Онлайн'],
            'offline' => ['fas fa-signal', 'Оффлайн'],
            'recently' => ['fas fa-hourglass-start text-success', 'Посещение недавно'],
            'long' => ['fas fa-hourglass-end text-danger', 'Посещение давно'],
            'banned' => ['fas fa-solid fa-ban text-danger', 'Забанен'],
            'deleted' => ['fas fa-solid fa-trash text-danger', 'Удален'],
            'friend' => ['fas fa-user-friends text-primary', 'Друг'],
            'you_follower' => ['fas fa-ghost text-primary', 'Подписка от вас'],
            'follower' => ['fas fa-mask text-primary', 'Подписка на вас'],
            'you_blacklist' => ['fas fa-toilet-paper text-danger', 'У вас в чс'],
            'blacklist' => ['fas fa-book-dead text-danger', 'Вы в чс'],
            'track' => ['fas fa-eye text-success', 'На трекере'],
            'favorite' => ['fas fa-star text-success', 'В избранном'],
            'bookmark' => ['fas fa-bookmark text-danger', 'Вк закладка'],
            'isHiddenFromFeed' => ['fas fa-eye-slash', 'Скрыт из новостей']

        ];

        $this->listIcon = $list;
    }

    /**
     * @return array
     */
    public function getListIcon(): array
    {
        return $this->listIcon;
    }

    /**
     * Получает список состояний, возвращает иконки для запрошенных состояний
     *
     * @param array $states
     * @return array
     */
    public function collectIcon(array $states) : array
    {
        $res = [];

        foreach ($states as $state) {
            if (array_key_exists($state, $this->listIcon)) {
                $res[] = $this->listIcon[$state];
            }
        }
        return $res;
    }

    /**
     * Формирует массив кодов для состояний-иконок на основе UserItem $contact
     * @param UserItem $item
     * @return array
     */
    private function getShortState(UserItem $item) : array
    {
        $states = [];

        $stateOnline = $item->getOnline();
        if ($stateOnline == 'онлайн') {
            $online = 'online';
        } else {
            $online = 'offline';
        }
        $states[] = $online;

        if ($stateOnline != 'онлайн'){
            $lastSeen = $item->getLastSeenDate();
            if ($lastSeen != $item->getUndefinedField()) {
                //Давность 30 суток
                $last = $item->getRecently(30);
                if ($last == 'Недавно') {
                    $recently  = 'recently';
                    $states[] = $recently;
                } else {
                    $recently = 'long';
                    $states[] = $recently;
                }
            }
        }

        $state = $item->getState();
        if ($state == 'Профиль удален') {
            $state = 'deleted';
            $states[] = $state;
        } elseif ($state == 'Профиль забанен') {
            $state = 'banned';
            $states[] = $state;
        }

        $areFriend = $item->getAreFriends();
        switch ($areFriend) {
            case 1 :
                $areFriend = 'you_follower';
                break;
            case 2 :
                $areFriend = 'follower';
                break;
            case 3 :
                $areFriend = 'friend';
                break;
        }
        $states[] = $areFriend;

        $blacklisted = $item->getIsBlacklisted();
        if ($blacklisted == 'Вы в ЧС у пользователя') {
            $states[] = 'blacklist';
        }
        $blacklistedMe = $item->getIsBlacklistedByMe();
        if ($blacklistedMe == 'Пользователь у вас в ЧС') {
            $states[] = 'you_blacklist';
        }

        $isBookmark = $item->getIsFavorite();
        if ($isBookmark == 'В закладках') {
            $states[] = 'bookmark';
        }
        $isHiddenFromFeed = $item->getIsHiddenFromFeed();
        if ($isHiddenFromFeed == 'Да') {
            $states[] = 'isHiddenFromFeed';
        }

        return $states;
    }


    /**
     * Формирует массив состояний-иконок на основе UserItem $contact
     * @param UserItem $contact
     * @return array
     */
    public function getCurrentIcons(UserItem $contact): array
    {
        $states = $this->getShortState($contact);
        $icons = $this->collectIcon($states);

        return $icons;
    }

}

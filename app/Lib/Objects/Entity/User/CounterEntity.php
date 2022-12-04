<?php
namespace App\Lib\Objects\Entity\User;

use App\Lib\Objects\Entity\Entity;

/**
 * Сущность из counters
 *
 * Установить количество различных объектов у пользователя (счетчики).
 * Поле возвращается только в методе users.get при запросе информации об одном пользователе, с передачей пользовательского access_token.
 * Объект, содержащий следующие поля:
 * albums (integer) — количество фотоальбомов;
 * videos (integer) — количество видеозаписей;
 * audios (integer) — количество аудиозаписей;
 * photos (integer) — количество фотографий;
 * friends (integer) — количество друзей;
 * online_friends (integer) — количество друзей онлайн;
 * mutual_friends (integer) — количество общих друзей;
 * user_videos (integer) — количество видеозаписей с пользователем;
 * followers (integer) — количество подписчиков;
 * pages (integer) — количество объектов в блоке «Интересные страницы».
 * subscriptions - Подписки на пользователей,
 * posts - Записи пользователя на стене
 * clips_followers - Количество подписчиков на клипы?
 **/
class CounterEntity extends Entity
{
    public function __construct($entity)
    {
        parent::__construct($entity);
    }

    public function getAlbumsCounter(): string
    {
        return $this->getValue('albums');
    }

    public function getVideosCounter(): string
    {
        return $this->getValue('videos');
    }

    public function getAudiosCounter(): string
    {
        return $this->getValue('audios');
    }

    public function getPhotosCounter(): string
    {
        return $this->getValue('photos');
    }

    public function getFriendsCounter(): string
    {
        return $this->getValue('friends');
    }

    public function getOnlineFriendsCounter(): string
    {
        return $this->getValue('online_friends');
    }

    public function getMutualFriendsCounter(): string
    {
        return $this->getValue('mutual_friends');
    }

    public function getUserVideosCounter(): string
    {
        return $this->getValue('user_videos');
    }

    public function getFollowersCounter(): string
    {
        return $this->getValue('followers');
    }

    public function getPagesCounter(): string
    {
        return $this->getValue('pages');
    }

    public function getSubscriptionsCounter(): string
    {
        return $this->getValue('subscriptions');
    }

    public function getPostsCounter(): string
    {
        return $this->getValue('posts');
    }

    public function getClipsFollowersCounter(): string
    {
        return $this->getValue('clips_followers');
    }

}

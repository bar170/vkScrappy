<?php
namespace App\Lib\Objects\User\Entity;



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

    /**
     * @param $name - имя счетчика
     */
    private function getCounter($name) : string
    {
        $res = $this->getUndefinedField();
        if (key_exists($name, $this->entity)) {
            $res = (string) $this->entity[$name];
        }

        return $res;
    }

    public function getAlbumsCounter(): string
    {
        $res = $this->getCounter('albums');
        return $res;
    }

    public function getVideosCounter(): string
    {
        $res = $this->getCounter('videos');
        return $res;
    }

    public function getAudiosCounter(): string
    {
        $res = $this->getCounter('audios');
        return $res;
    }

    public function getPhotosCounter(): string
    {
        $res = $this->getCounter('photos');
        return $res;
    }

    public function getFriendsCounter(): string
    {
        $res = $this->getCounter('friends');
        return $res;
    }

    public function getOnlineFriendsCounter(): string
    {
        $res = $this->getCounter('online_friends');
        return $res;
    }

    public function getMutualFriendsCounter(): string
    {
        $res = $this->getCounter('mutual_friends');
        return $res;
    }

    public function getUserVideosCounter(): string
    {
        $res = $this->getCounter('user_videos');
        return $res;
    }

    public function getFollowersCounter(): string
    {
        $res = $this->getCounter('followers');
        return $res;
    }

    public function getPagesCounter(): string
    {
        $res = $this->getCounter('pages');
        return $res;
    }

    public function getSubscriptionsCounter(): string
    {
        $res = $this->getCounter('subscriptions');
        return $res;
    }

    public function getPostsCounter(): string
    {
        $res = $this->getCounter('posts');
        return $res;
    }

    public function getClipsFollowersCounter(): string
    {
        $res = $this->getCounter('clips_followers');
        return $res;
    }


}

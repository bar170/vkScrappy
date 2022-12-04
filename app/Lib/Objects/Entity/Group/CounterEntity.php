<?php
namespace App\Lib\Objects\Entity\Group;

/**
 * Объект, содержащий счётчики сообщества, может включать любой набор из следующих полей:
 * photos, albums, audios, videos, topics, docs, articles, narratives, clips
 * clips_followers - количество участников
 */
use App\Lib\Objects\Entity\Entity;

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

    public function getTopicsCounter(): string
    {
        return $this->getValue('topics');
    }

    public function getDocsCounter(): string
    {
        return $this->getValue('docs');
    }

    public function getArticlesCounter(): string
    {
        return $this->getValue('articles');
    }


    /**
     * Почему-то иногда равно количеству участников, так и не понял что значит это поле
     * убрал из вывода компонента
     * @return string
     */
    public function getFollowersCounter(): string
    {
        return $this->getValue('clips_followers');
    }

    public function getNarrativesCounter(): string
    {
        return $this->getValue('narratives');
    }

    public function getClipsCounter(): string
    {
        return $this->getValue('clips');
    }
}

<?php

namespace App\View\Components;

use App\Lib\Objects\User\UserItem;
use Illuminate\View\Component;

class CountersUserComponent extends Component
{

    public array $counters;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(UserItem $item)
    {
        $counters['Альбомы'] = $item->getAlbumsCounter();
        $counters['Видео'] = $item->getVideosCounter();
        $counters['Аудио'] = $item->getAudiosCounter();
        $counters['Фото'] = $item->getPhotosCounter();
        $counters['Друзья'] = $item->getFriendsCounter();
        $counters['Друзья онлайн'] = $item->getOnlineFriendsCounter();
        $counters['Подписчики'] = $item->getFollowersCounter();
        $counters['Общие друзья'] = $item->getMutualFriendsCounter();
        $counters['Видео пользователя'] = $item->getUserVideosCounter();
        $counters['Интересные страницы'] = $item->getPagesCounter();
        $counters['Подписки на пользователей'] = $item->getSubscriptionsCounter();
        $counters['Собственные записи'] = $item->getPostsCounter();
        $counters['Клипы подписчиков?'] = $item->getClipsFollowersCounter();

        $this->counters = $counters;


    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.counters-user-component');
    }
}

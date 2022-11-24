<?php
namespace App\View\Components\Users;

use App\Lib\Objects\User\UserItem;
use Illuminate\View\Component;

class CountersComponent extends Component
{

    public array $counters;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(UserItem $item)
    {
        $entity = $item->getCounters();
        $counters['Альбомы'] = $entity->getAlbumsCounter();
        $counters['Видео'] = $entity->getVideosCounter();
        $counters['Аудио'] = $entity->getAudiosCounter();
        $counters['Фото'] = $entity->getPhotosCounter();
        $counters['Друзья'] = $entity->getFriendsCounter();
        $counters['Друзья онлайн'] = $entity->getOnlineFriendsCounter();
        $counters['Подписчики'] = $entity->getFollowersCounter();
        $counters['Общие друзья'] = $entity->getMutualFriendsCounter();
        $counters['Видео пользователя'] = $entity->getUserVideosCounter();
        $counters['Интересные страницы'] = $entity->getPagesCounter();
        $counters['Подписки на пользователей'] = $entity->getSubscriptionsCounter();
        $counters['Собственные записи'] = $entity->getPostsCounter();
        $counters['Клипы подписчиков?'] = $entity->getClipsFollowersCounter();

        $this->counters = $counters;


    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.users.counters-component');
    }
}

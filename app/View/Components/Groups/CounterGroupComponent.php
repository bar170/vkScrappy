<?php

namespace App\View\Components\Groups;

use Illuminate\View\Component;
use App\Lib\Objects\Group\GroupItem;

class CounterGroupComponent extends Component
{
    public array $counters;

    public function __construct(GroupItem $item)
    {
        $entity = $item->getCountersEntity();
        $counters['Альбомы'] = $entity->getAlbumsCounter();
        $counters['Видео'] = $entity->getVideosCounter();
        $counters['Аудио'] = $entity->getAudiosCounter();
        $counters['Фото'] = $entity->getPhotosCounter();
        $counters['Обсуждения'] = $entity->getTopicsCounter();
        $counters['Друзья онлайн'] = $entity->getDocsCounter();
        $counters['Статьи'] = $entity->getArticlesCounter();
        $counters['Истории'] = $entity->getNarrativesCounter();
        $counters['Клипы'] = $entity->getClipsCounter();

        $this->counters = $counters;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.groups.counter-group-component');
    }
}

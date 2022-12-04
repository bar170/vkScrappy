<?php

namespace App\View\Components\Groups;

use App\Lib\Objects\Group\GroupItem;
use Illuminate\View\Component;

class BanGroupComponent extends Component
{

    public bool $isExist;
    public string $isBan;
    public string $dateEndBan;
    public string $commentBan;

    public function __construct(GroupItem $item)
    {
        $entity = $item->getBanInfoEntity();
        $this->isExist = $entity->getIsExist();
        $this->isBan = $entity->getIsBan();
        $this->dateEndBan = $entity->getEndDate();
        $this->commentBan = $entity->getComment();

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.groups.ban-group-component');
    }
}

<?php

namespace App\View\Components\Users;

use App\Lib\Front\Icon;
use App\Lib\Objects\User\UserItem;
use Illuminate\View\Component;


/**
 * Выводит статусные иконки с пояснением о пользователе
 */
class IconsComponent extends Component
{
    public UserItem $item;
    public array $icons;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(UserItem $item)
    {
        $this->item = $item;
        $iconMaster = new Icon();
        $this->icons = $iconMaster->getCurrentIcons($this->item);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.users.icons-component');
    }
}

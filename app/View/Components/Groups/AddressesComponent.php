<?php
namespace App\View\Components\Groups;

use App\Lib\Objects\Group\GroupItem;
use Illuminate\View\Component;

class AddressesComponent extends Component
{

    public string $isEnabled;
    public string $mainAddressId;

    public function __construct(GroupItem $item)
    {
        $entity = $item->getAddressesEntity();
        $this->isEnabled = $entity->getIsEnabled();
        $this->mainAddressId = $entity->getMainAddressId();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.groups.addresses-component');
    }
}

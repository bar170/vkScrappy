<?php

namespace App\View\Components\Groups;

use App\Lib\Objects\Entity\Group\ContactsEntity;
use App\Lib\Objects\Group\GroupItem;
use Illuminate\View\Component;

class ContactsGroupComponent extends Component
{
    public bool $isExist;
    public array $contacts;
    public ContactsEntity $entity;

    public function __construct(GroupItem $item)
    {
        $entity = $item->getContactsEntity();
        $this->entity = $entity;
        $this->isExist = $entity->getIsExist();
        $this->contacts = $entity->getContacts();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.groups.contacts-group-component');
    }
}

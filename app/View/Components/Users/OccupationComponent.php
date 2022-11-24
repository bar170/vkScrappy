<?php
namespace App\View\Components\Users;

use App\Lib\Objects\User\UserItem;
use Illuminate\View\Component;

class OccupationComponent extends Component
{
    public array $occupation;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(UserItem $item)
    {
        $entity = $item->getOccupation();
        $occupation['Occupation id'] = $entity->getIdOccupation();
        $occupation['Название'] = $entity->getNameOccupation();
        $occupation['Тип'] = $entity->getTypeOccupation();
        $occupation['Год завершения'] = $entity->getGraduateYearOccupation();
        $occupation['Город (id)'] = $entity->getCityIdOccupation();
        $occupation['Страна (id)'] = $entity->getCountryIdOccupation();

        $this->occupation = $occupation;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.users.occupation-component');
    }
}

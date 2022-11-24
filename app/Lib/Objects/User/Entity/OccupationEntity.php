<?php
namespace App\Lib\Objects\User\Entity;

use App\Lib\Objects\Flags;


/**
 * Информация о текущем роде занятия пользователя.
 * Объект, содержащий следующие поля:
 * type (string) — тип. Возможные значения:
 * work — работа;
 * school — среднее образование;
 * university — высшее образование.
 * id (integer) — идентификатор школы, вуза, сообщества компании (в которой пользователь работает);
 * name (string) — название школы, вуза или места работы;
 */

class OccupationEntity extends Entity
{
    public function __construct($entity)
    {
        parent::__construct($entity);

        $this->setEntity($entity);
    }

    protected function setEntity($entity): void
    {
        if ($entity != $this->getUndefinedField()) {
            if (count($entity) < 1) {

                $res['id'] = $this->getRemoveField();
                $res['name'] = $this->getRemoveField();
                $res['type'] = $this->getRemoveField();
                $res['graduate_year'] = $this->getRemoveField();
                $res['country_id'] = $this->getRemoveField();
                $res['city_id'] = $this->getRemoveField();
            } else {
                $res = $entity;
            }
        } else {
            $res['id'] = $this->getUndefinedField();
            $res['name'] = $this->getUndefinedField();
            $res['type'] = $this->getUndefinedField();
            $res['graduate_year'] = $this->getUndefinedField();
            $res['country_id'] = $this->getUndefinedField();
            $res['city_id'] = $this->getUndefinedField();
        }

        $this->entity = $res;
    }

    public function getIdOccupation(): string
    {
        return $this->getValue('id');
    }

    public function getNameOccupation(): string
    {
        return $this->getValue('name');
    }

    public function getTypeOccupation(): string
    {
        return $this->getValue('type');
    }

    public function getGraduateYearOccupation(): string
    {
        return $this->getValue('graduate_year');
    }

    public function getCountryIdOccupation(): string
    {
        return $this->getValue('country_id');
    }

    public function getCityIdOccupation(): string
    {
        return $this->getValue('city_id');
    }


}

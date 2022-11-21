<?php
namespace App\Lib\Objects\User\Entity;

use App\Lib\Objects\Flags;

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

                $entity['id'] = $this->getRemoveField();
                $entity['name'] = $this->getRemoveField();
                $entity['type'] = $this->getRemoveField();
                $entity['graduate_year'] = $this->getRemoveField();
                $entity['country_id'] = $this->getRemoveField();
                $entity['city_id'] = $this->getRemoveField();
            }
        } else {
            $entity['id'] = $this->getUndefinedField();
            $entity['name'] = $this->getUndefinedField();
            $entity['type'] = $this->getUndefinedField();
            $entity['graduate_year'] = $this->getUndefinedField();
            $entity['country_id'] = $this->getUndefinedField();
            $entity['city_id'] = $this->getUndefinedField();
        }

        $this->entity = $entity;
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

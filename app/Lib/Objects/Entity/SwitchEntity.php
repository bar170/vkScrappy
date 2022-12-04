<?php
namespace App\Lib\Objects\Entity;
/**
 * От этого класса наследуются объекты не массивы. Те которые возвращают коды.
 * Например, 1 - участник группы
 */
class SwitchEntity extends Entity
{
    //Все возможные валидные значения для этого поля
    protected array $validValues;

    /**
     * Проверить что значение находится в разрешенном диапазоне
     * @param $entity
     * @return void
     */
    protected function setEntity($entity): void
    {
        if (in_array($entity, $this->validValues)) {
            $this->entity[0] = $entity;
        } else {
            $this->entity[0] = $this->getUncorrectField();
        }
    }

    protected function setIsExist(): void
    {
        $failValues = [$this->getUncorrectField(), $this->getUndefinedField()];
        if (in_array($this->entity[0], $failValues, true))
        {
            $this->isExist = false;
        } else {
            $this->isExist = true;
        }
    }

    protected function setValidValues(array $values)
    {
        $this->validValues = $values;
    }

    public function getValue(string $name = '') : string
    {
        $res = $this->getUndefinedField();
        if ($this->isExist) {
            $res = $this->entity[0];
        }
        return $res;
    }

}

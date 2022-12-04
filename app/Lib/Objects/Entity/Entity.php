<?php
namespace App\Lib\Objects\Entity;


use App\Lib\Objects\Flags;

class Entity
{
    protected array $entity;
    protected bool $isExist;
    protected string $undefinedField = Flags::UNDEFINED_FIELD;
    protected string $removeField = Flags::REMOVE_FIELD;
    protected string $uncorrectField = Flags::UNCORRECT_FIELD;

    public function __construct($entity)
    {
        $this->setEntity($entity);
        $this->setIsExist();
    }

    protected function setEntity($entity): void
    {
        if (is_array($entity)) {
            $this->entity = $entity;
        } else {
            $this->entity = [];
        }
    }

    protected function setIsExist(): void
    {
        if ($this->entity == [])
        {
            $this->isExist = false;
        } else {
            $this->isExist = true;
        }
    }

    /**
     * Получить значение из массива или значение константы
     * Необходимо когда у сущности неизвестное количество строк, например link в группах
     * @param string $key
     * @param array $list
     * @return string
     */
    protected function getInnerValue(array $list, string $key): string
    {
        $res = $this->getUndefinedField();
        if (key_exists($key, $list))
        {
            $res = (string) $list[$key];
        }
        return $res;
    }

    public function getIsExist(): bool
    {
        return $this->isExist;
    }

    /**
     * Получить значение по ключу из $this->entity,
     * не путать со вспомогательным методом getInnerValue
     * @param string $name
     * @return string
     */
    public function getValue(string $name = '') : string
    {
        return $this->getInnerValue($this->entity, $name);
    }


    protected function getUndefinedField(): string
    {
        return $this->undefinedField;
    }

    public function getRemoveField(): string
    {
        return $this->removeField;
    }

    public function getUncorrectField(): string
    {
        return $this->uncorrectField;
    }


}

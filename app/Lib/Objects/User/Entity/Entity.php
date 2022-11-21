<?php
namespace App\Lib\Objects\User\Entity;


use App\Lib\Objects\Flags;

class Entity
{
    protected array $entity;
    protected bool $isExist;
    protected string $undefinedField = Flags::UNDEFINED_FIELD;
    protected string $removeField = Flags::REMOVE_FIELD;

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

    public function getValue($name) : string
    {
        $res = $this->getUndefinedField();
        if (key_exists($name, $this->entity)) {
            $res = $this->entity[$name];
        }
        return $res;
    }

    protected function getUndefinedField(): string
    {
        return $this->undefinedField;
    }

    public function getRemoveField(): string
    {
        return $this->removeField;
    }


}

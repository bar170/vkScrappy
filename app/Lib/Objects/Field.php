<?php
namespace App\Lib\Objects;

class Field
{
    protected string $name;
    protected $value;
    protected bool $isExist;
    protected $item;

    protected string $notExistField = Flags::NOT_EXIST_FIELD;

    public function __construct($name, $item)
    {
        if (array_key_exists($name, $item)) {
        $this->name = $name;
        $this->value = $item[$name];
        $this->isExist = true;
        } else {
            $this->isExist = false;
            $this->value = $this->getNotExistField();
        }
    }

    protected function getNotExistField() : string
    {
        return $this->notExistField;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function isExist(): bool
    {
        return $this->isExist;
    }
}

<?php
namespace App\Lib\Objects;

class Field
{
    private string $name;
    private $value;
    private bool $isExist;

    public function __construct($name, $item)
    {
        if (array_key_exists($name, $item)) {
        $this->name = $name;
        $this->value = $item[$name];
        $this->isExist = true;
        } else {
            $this->isExist = false;
        }
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

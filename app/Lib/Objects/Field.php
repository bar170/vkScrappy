<?php
namespace App\Lib\Objects;


/**
 * Получает массив $item, ищет в нем ключ name.
 * Если не находит - присваивает value = notExistField (Поля не существует).
 * Если ключ существует - в value определяется значение этого ключа. Или строка и массив
 */
class Field
{
    private string $name;
    private $value;
    private bool $isExist;
    private bool $isSimple;


    public function __construct(string $name, array $item)
    {
        $this->setState($name, $item);
        $this->setIsSimple();
    }

    /**
     * Устанавливает состояние объекта
     * Если name не найден в item, установить в value значение - null
     * @param string $name
     * @param array $item
     * @return void
     */
    private function setState(string $name, array $item): void
    {
        $this->name = $name;
        if (array_key_exists($name, $item)) {
            $this->value = $item[$name];
            $this->isExist = true;
        } else {
            $this->isExist = false;
            $this->value = null;
        }
    }

    /**
     * Определяет простоту поля.
     * Если true - простое поле
     * если false - поле является объектом
     * @return void
     */
    private function setIsSimple(): void
    {
        $res = true;
        if (is_array($this->value)) {
            $res = false;
        }
        $this->isSimple = $res;
    }

    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return array|string|null
     */
    public function getValue()
    {
        return $this->value;
    }

    public function isExist(): bool
    {
        return $this->isExist;
    }

    public function isSimple(): bool
    {
        return $this->isSimple();
    }
}

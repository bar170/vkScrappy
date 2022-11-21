<?php
namespace App\Lib\Objects;

use App\Lib\Request\Request;

/**
 * Генерирует объект в зависимости от имени поля
 */
class Item
{
    protected array $item;
    protected Request $request;

    protected string $undefinedField = Flags::UNDEFINED_FIELD;

    public function __construct(array $item)
    {
        $this->item = $item;
        date_default_timezone_set('Europe/Moscow');
    }

    public function getUndefinedField() : string
    {
        return $this->undefinedField;
    }

    /**
     * Вернуть значение поля по имени в "сыром виде"
     * @param $name
     * @return mixed|string
     */
    public function getField($name)
    {
        $res = $this->getUndefinedField();
        $field = new Field($name, $this->item);

        if ($field->isExist()) {
            $res = $field->getValue();
        }

        return $res;
    }

    public function getId()
    {
        return $this->getField('id');
    }

}

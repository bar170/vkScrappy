<?php
namespace App\Lib\Objects;

/**
 * Генерирует объект в зависимости от имени поля
 */
class Item
{
    protected array $item;

    protected const UNDEFINED_FIELD = 'Поле не определено';

    public function __construct(array $item)
    {
        $this->item = $item;
        date_default_timezone_set('Europe/Moscow');
    }

    public function getUndefinedField() : string
    {
        return self::UNDEFINED_FIELD;
    }

    /**
     * Вернуть значение поля по имени в "сыром виде"
     * @param $name
     * @return mixed|string
     */
    public function getField($name)
    {
        $res = self::UNDEFINED_FIELD;
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

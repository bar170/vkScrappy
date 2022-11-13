<?php
namespace App\Lib\Objects;

/**
 * Генерирует объект в зависимости от имени поля
 */
class Item
{
    protected array $item;

    public function __construct(array $item)
    {
        $this->item = $item;
        date_default_timezone_set('Europe/Moscow');
    }

    /**
     * Вернуть значение поля по имени в "сыром виде"
     * @param $name
     * @return mixed|string
     */
    public function getField($name)
    {
        $res = 'Поля не существует';
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

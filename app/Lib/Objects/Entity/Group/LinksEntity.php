<?php
namespace App\Lib\Objects\Entity\Group;

use App\Lib\Objects\Entity\Entity;

/**
 * Информация из блока ссылок сообщества. Массив объектов, каждый из которых содержит следующие поля:
 * id (integer) — идентификатор ссылки;
 * url (string) — URL;
 * name (string) — название ссылки;
 * desc (string) — описание ссылки;
 * photo_50 (string) — URL изображения-превью шириной 50px;
 * photo_100 (string) — URL изображения-превью шириной 100px.
 */
class LinksEntity extends Entity
{
    public function __construct($entity)
    {
        parent::__construct($entity);
    }

    public function getLink() {
        return $this->entity;
    }



}

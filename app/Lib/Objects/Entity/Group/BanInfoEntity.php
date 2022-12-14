<?php
namespace App\Lib\Objects\Entity\Group;

/**
 * Информация о занесении в черный список сообщества (поле возвращается только при запросе информации об одном сообществе). Объект, содержащий следующие поля:
 * end_date (integer) — срок окончания блокировки в формате unixtime;
 * comment (string) — комментарий к блокировке.
 */
use App\Lib\Objects\Entity\Entity;

class BanInfoEntity extends Entity
{
    public function __construct($entity)
    {
        parent::__construct($entity);
    }

    public function getIsBan(): string
    {
        return ($this->isExist) ? 'Вы в бане' : 'Вы не в бане';
    }

    public function getEndDate(): string
    {
        return ($this->isExist) ? date('d-M-Y', $this->entity['end_date']) : 'Вы не в бане';
    }

    public function getComment(): string
    {
        return ($this->isExist) ? $this->entity['comment'] : 'Вы не в бане';
    }
}

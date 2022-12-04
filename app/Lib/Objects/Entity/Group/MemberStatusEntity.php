<?php
namespace App\Lib\Objects\Entity\Group;

use App\Lib\Objects\Entity\SwitchEntity;

/**
 * Статус участника текущего пользователя. Возможные значения:
 * 0 — не является участником;
 * 1 — является участником;
 * 2 — не уверен, что посетит мероприятие;
 * 3 — отклонил приглашение;
 * 4 — запрос на вступление отправлен;
 * 5 — приглашен.
 */
class MemberStatusEntity extends SwitchEntity
{
    public function __construct($entity)
    {
        $this->setValidValues([0, 1, 2, 3, 4, 5]);

        parent::__construct($entity);

        $this->setEntity($entity);
        $this->setIsExist();
    }

    /**
     * Возвращает расшифровку кода
     * @return string
     */
    public function getDescription(): string
    {
        $res = $this->getCode();
        if ($this->isExist) {
            switch ($res) {
                case 0:
                    $res = 'Не является участником';
                    break;
                case 1:
                    $res = 'Является участником';
                    break;
                case 2:
                    $res = 'Не уверен, что посетит мероприятие';
                    break;
                case 3:
                    $res = 'Отклонил приглашение';
                    break;
                case 4:
                    $res = 'Запрос на вступление отправлен';
                    break;
                case 5:
                    $res = 'Приглашен';
                    break;
            }
        }
        return $res;
    }

    /**
     * Возвращает код
     */
    public function getCode()
    {
        return $this->getValue();
    }
}

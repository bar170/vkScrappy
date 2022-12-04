<?php
namespace App\Lib\Objects\Entity\Group;

use App\Lib\Objects\Entity\Entity;

/**
 * Информация об адресах сообщества.
 * Возвращаются следующие поля:
 * is_enabled (boolean) — включен ли блок адресов в сообществе.
 * main_address_id (integer) — идентификатор основного адреса.
 */
class AddressesEntity extends Entity
{
    private bool $isEnabled = false;

    public function __construct($entity)
    {
        parent::__construct($entity);
        if ($this->isExist) {
            $this->isEnabled = $entity['is_enabled'];
        }
    }

    public function getIsEnabled(): string
    {
        return ($this->isEnabled) ? 'Включен' : 'Не включен';
    }

    public function getMainAddressId(): string
    {
        return ($this->isEnabled) ? (string) $this->entity['main_address_id'] : 'Адрес не доступен';
    }
}

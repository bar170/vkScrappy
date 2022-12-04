<?php
namespace App\Lib\Objects\Entity\Group;

/**
 * Информация из блока контактов публичной страницы. Массив объектов, каждый из которых может содержать поля:
 * user_id (integer) — идентификатор пользователя;
 * desc (string) — должность;
 * phone (string) — номер телефона;
 * email (string) — адрес e-mail.
 */
use App\Lib\Objects\Entity\Entity;

class ContactsEntity extends Entity
{
    public function __construct($entity)
    {
        parent::__construct($entity);
    }

    public function getContacts(): array
    {
        return $this->entity;
    }

    public function getUserId(array $contact)
    {
        return $this->getInnerValue($contact, 'user_id');
    }

    public function getDesk(array $contact)
    {
        return $this->getInnerValue($contact, 'desc');
    }

    public function getPhone(array $contact)
    {
        return $this->getInnerValue($contact, 'phone');
    }

    public function getEmail(array $contact)
    {
        return $this->getInnerValue($contact, 'email');
    }
}

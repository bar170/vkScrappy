<?php
namespace App\Lib\Request\Support;

use App\Lib\Request\Request;

/**
 * Вспомогательный класс, содержит списки доступных полей
 */
class ListField
{

    private string $type;
    private array $fields = [];

    public function __construct($type)
    {
        $this->type = $type;
        $this->setFriendFields();
        $this->setGroupFields();
    }

    //Ассоциативный массив, в качестве ключа имя поля, в качестве значения массив из списков типа запроса, которым может соответствовать поле
    private function setFriendFields(): void
    {
        $this->addField('about', 'user', 30);
        $this->addField('activities' , 'user', 80);
        $this->addField('bdate' , 'user', 10);
        $this->addField('blacklisted' , 'user', 10);
        $this->addField('blacklisted_by_me' , 'user', 10);
        $this->addField('books' , 'user', 100);
        $this->addField('can_post' , 'user', 30);
        $this->addField('can_see_all_posts' , 'user', 30);
        $this->addField('can_see_audio' , 'user', 30);
        $this->addField('can_send_friend_request' , 'user', 70);
        $this->addField('can_write_private_message' , 'user', 10);
        $this->addField('career' , 'user', 80);
        $this->addField('city' , 'user', 20);
        $this->addField('country' , 'user', 20);
        $this->addField('common_count' , 'user', 10);
        $this->addField('connections' , 'user', 30);
        $this->addField('contacts' , 'user', 30);
        $this->addField('counters' , 'user', 20);
        $this->addField('domain' , 'user', 20);
        $this->addField('education' , 'user', 60);
        $this->addField('exports' , 'user', 50);
        $this->addField('followers_count' , 'user', 20);
        $this->addField('friend_status' , 'user', 10);
        $this->addField('has_mobile' , 'user', 40);
        $this->addField('has_photo' , 'user', 50);
        $this->addField('home_town' , 'user', 20);
        $this->addField('interests' , 'user', 80);
        $this->addField('is_favorite' , 'user', 30);
        $this->addField('is_friend' , 'user', 20);
        $this->addField('is_hidden_from_feed' , 'user', 40);
        $this->addField('is_no_index' , 'user', 80);
        $this->addField('last_seen' , 'user', 10);
        $this->addField('maiden_name' , 'user', 20);
        $this->addField('military' , 'user', 80);
        $this->addField('movies' , 'user', 90);
        $this->addField('music' , 'user', 90);
        $this->addField('nickname' , 'user', 10);
        $this->addField('occupation' , 'user', 80);
        $this->addField('online' , 'user', 10);
        $this->addField('personal' , 'user', 80);
        $this->addField('photo_50' , 'user', 10);
        $this->addField('photo_200' , 'user', 90);
        $this->addField('quotes' , 'user', 30);
        $this->addField('relatives' , 'user', 50);
        $this->addField('relation' , 'user', 30);
        $this->addField('schools' , 'user', 90);
        $this->addField('screen_name' , 'user', 10);
        $this->addField('sex' , 'user', 0);
        $this->addField('site' , 'user', 40);
        $this->addField('status' , 'user', 10);
        $this->addField('trending' , 'user', 90);
        $this->addField('tv' , 'user', 90);
        $this->addField('universities' , 'user', 50);
        $this->addField('verified' , 'user', 50);
        $this->addField('wall_default' , 'user', 40);
    }

    private function setGroupFields(): void
    {
        $this->addField('activity' , 'group', 30);
        $this->addField('addresses' , 'group', 80);
        $this->addField('can_create_topic' , 'group', 80);
        $this->addField('can_message' , 'group', 80);
        $this->addField('can_post' , 'group', 80);
        $this->addField('can_see_all_posts' , 'group', 20);
        $this->addField('can_upload_doc' , 'group', 80);
        $this->addField('can_upload_video' , 'group', 80);
        $this->addField('city' , 'group', 10);
        $this->addField('country' , 'group', 10);
        $this->addField('contacts' , 'group', 30);
        $this->addField('counters' , 'group', 10);
        $this->addField('ban_info' , 'group', 30);
        $this->addField('is_messages_blocked' , 'group', 30);
        $this->addField('description' , 'group', 0);
        $this->addField('has_photo' , 'group', 50);
        $this->addField('is_favorite' , 'group', 20);
        $this->addField('links' , 'group', 50);
        $this->addField('market' , 'group', 90);
        $this->addField('main_section' , 'group', 90);
        $this->addField('member_status' , 'group', 20);
        $this->addField('members_count' , 'group', 0);
        $this->addField('place' , 'group', 80);
        $this->addField('public_date_label' , 'group', 20);
        $this->addField('site' , 'group', 20);
        $this->addField('start_date' , 'group', 30);
        $this->addField('finish_date' , 'group', 30);
        $this->addField('status' , 'group', 10);
        $this->addField('trending' , 'group', 80);
        $this->addField('verified' , 'group', 30);
        $this->addField('wall' , 'group', 10);
    }


    /**
     * Получить все возможные поля согласно их типа
     *
     * @return array
     */
    private function getFields(): array
    {
        $res = [];
        foreach ($this->fields as $field => $value) {
            if (array_key_exists($this->type, $value)) {
                $res[$field] = $value[$this->type];
            }
        }

        return $res;
    }


    /**
     * Проверить существование поля, добавить в список доступных полей название и его тип
     *
     * @param string $field название поля
     * @param string $type к какому типу относится поле
     * @param int $weight важность поля от 0 до 100, чем ближе к 0 тем обязательней поле к получению (минимальный набор)
     * @return void
     */
    public function addField($field, $type, $weight = 0)
    {
        if (array_key_exists($field, $this->fields)) {
            if (!in_array($type, $this->fields[$field])) {
                $this->fields[$field][$type] = $weight;
            }
        } else {
            $this->fields[$field] = [$type => $weight];
        }
    }

    /**
     * Вернуть массив полей в соответствии с заданным весом
     * (вернутся все поля которые имеют приоритет ниже указанного веса) - от 0 до 100
     * Если нужно получить все поля, то вызывать с весом = 100
     *
     * @param $weight
     * @return array
     */
    public function getFieldsByWeight($weight): array
    {
        $fields = $this->getFields();
        $res = [];

        foreach ($fields as $field => $value) {
            if ($value < $weight) {
                $res[] = $field;
            }
        }

        return $res;
    }
}

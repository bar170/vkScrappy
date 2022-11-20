<?php
namespace App\Lib\Front;


/**
 * Класс для работы с иконками
 */
class Icon
{
    protected array $listIcon;

    public function __construct()
    {
        $this->setListIcon();
    }

    /**
     * Устанавливает массив соответствия. Под ключом иконка и поясняющий текст
     * @return void
     */
    private function setListIcon(): void
    {
        $list = [
            'online' => ['fas fa-signal text-success', 'Онлайн'],
            'offline' => ['fas fa-signal', 'Оффлайн'],
            'recently' => ['fas fa-hourglass-start text-success', 'Посещение недавно'],
            'long' => ['fas fa-hourglass-end text-danger', 'Посещение давно'],
            'banned' => ['fas fa-solid fa-ban text-danger', 'Забанен'],
            'deleted' => ['fas fa-solid fa-trash text-danger', 'Удален'],
            'friend' => ['<fas fa-user-friends text-primary', 'Друг'],
            'you_follower' => ['fas fa-ghost text-primary', 'Вы подписаны'],
            'follower' => ['fas fa-mask text-primary', 'Подписан на вас'],
            'you_blacklist' => ['fas fa-toilet-paper text-danger', 'У вас в чс'],
            'blacklist' => ['fas fa-book-dead text-danger', 'Вы в чс'],
            'track' => ['fas fa-eye text-success', 'На трекере'],
            'favorite' => ['<fas fa-star text-success', 'В избранном'],

        ];

        $this->listIcon = $list;
    }

    /**
     * @return array
     */
    public function getListIcon(): array
    {
        return $this->listIcon;
    }

    /**
     * Получает список состояний, возвращает иконки для запрошенных состояний
     *
     * @param array $states
     * @return array
     */
    public function collectIcon(array $states) : array
    {
        $res = [];

        foreach ($states as $state) {
            if (array_key_exists($state, $this->listIcon)) {
                $res[] = $this->listIcon[$state];
            }
        }
        return $res;
    }

}

@extends('dashboard.layouts.base')

@section('style')
    <link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('title')
     Пользователь - {{$id}} ({{ $item->getDomain() }})
@endsection

@section('main')

    <div class="row">
        <div class="col-lg-7">
            <div class="card mb-4">
                <div class="card-header">
                    <a href="https://vk.com/{{ $item->getDomain() }}">  {{ $item->getFirstName() }} {{ $item->getLastName() }}</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <p><img src="{{ $item->getPhoto200() }}" alt="Ава200">
                            </p>
                            {{-- Вывод иконок состояний пользователя--}}
                            <x-users.icons-component :item="$item"/>
                            <hr>
                            <i class="fas fa-eye text-success"></i> Добавлен ли в трекер? <br>
                            <i class="fas fa-star text-success"></i> Находится ли в избранном <br>
                        </div>
                        <div class="col-sm-8">
                            <p>
                                Имя: <span class="float-right">{{ $item->getFirstName() }} </span><br>
                                Фамилия: <span class="float-right">{{ $item->getLastName() }} </span><br>
                                Пол: <span class="float-right">{{ $item->getSex() }} </span><br>
                                Общих друзей: <span class="float-right">{{ $item->getCommonCount() }} </span><br>
                                Количество подписчиков: <span class="float-right">{{ $item->getCountFollowers() }} </span><br>
                                Город: <span class="float-right">{{ $item->getCity() }} </span><br>
                                Страна: <span class="float-right">{{ $item->getCountry() }} </span><br>
                                Дата рождения: <span class="float-right">{{ $item->getBDate() }} </span><br>
                                Статус: <span class="float-right">{{ $item->getStatus() }} </span><br>
                                Отношения: <span class="float-right">{{ $item->getStateAreFriends() }} </span><br>
                            <hr>

                            <h6 class="text-primary">Онлайн</h6>
                                Последний раз онлайн: <span class="float-right">{{ $item->getLastPlatform() }} </span><br>
                                Дата: <span class="float-right">{{ $item->getLastSeenDate() }} </span><br>
                                Время: <span class="float-right">{{ $item->getLastSeenTime() }} </span><br>
                            <hr>
                            {{-- Вывод счетчиков пользователя--}}
                            <x-users.counters-component :item="$item"/>
                            <hr>
                            <h6 class="text-primary">Состояние</h6>
                                Тип: <span class="float-right">{{ $item->getIsClosed() }} </span><br>
                                Доступность: <span class="float-right">{{ $item->getCanAccessClosed() }} </span><br>
                                Состояние: <span class="float-right">{{ $item->getState() }} </span><br>
                                Верификация: <span class="float-right">{{ $item->getVerified() }} </span><br>
                            <hr>
                            <h6 class="text-primary">Доступы</h6>
                                Режим стены: <span class="float-right ">{{ $item->getWallDefault() }} </span><br>
                                Запись на стене: <span class="float-right">{{ $item->getCanPost() }} </span><br>
                                Чужие посты: <span class="float-right">{{ $item->getCanSeeAllPosts() }} </span><br>
                                Видимость аудио: <span class="float-right">{{ $item->getCanSeeAudio() }} </span><br>
                                Запрос на дружбу: <span class="float-right">{{ $item->getCanSendFriendRequest() }} </span><br>
                                Сообщения: <span class="float-right">{{ $item->getCanWritePrivateMessage() }} </span><br>
                            <hr>
                            <h6 class="text-primary">Черный список</h6>
                                Вы в чс: <span class="float-right">{{ $item->getIsBlacklisted() }} </span><br>
                                Профиль в вашем чс: <span class="float-right">{{ $item->getIsBlacklistedByMe() }} </span><br>
                            <hr>
                            <h6 class="text-primary">Ссылки</h6>
                                Скайп: <span class="float-right">{{ $item->getSkype() }} </span><br>
                                Сайт: <span class="float-right">{{ $item->getSite() }} </span><br>
                                Короткий адрес страницы: <span class="float-right">{{ $item->getDomain() }} </span><br>
                            <hr>
                            <h6 class="text-primary">About</h6>
                                Обо мне: <span class="float-right">{{ $item->getAbout() }} </span><br>
                                Деятельность: <span class="float-right">{{ $item->getActivities() }} </span><br>
                            <hr>
                            <h6 class="text-primary">Карьера</h6>
                                Компания: <span class="float-right">{{ $item->getCompany() }} </span><br>
                                Город: <span class="float-right">{{ $item->getCityName() }} </span><br>
                                Должность: <span class="float-right">{{ $item->getPosition() }} </span><br>
                                Начало работы: <span class="float-right">{{ $item->getCareerFrom() }} </span><br>
                                Окончание работы: <span class="float-right">{{ $item->getCareerUntil() }} </span><br>
                            </p>
                            <hr>
                            {{-- Вывод occupation--}}
                            <x-users.occupation-component :item="$item"/>
                            <hr>
                            <h6 class="text-primary">Разное</h6>
                            Известен ли номер телефона: <span class="float-right">{{ $item->getHasMobile() }} </span><br>
                            Установил ли аву: <span class="float-right">{{ $item->getHasPhoto() }} </span><br>
                            Родной город: <span class="float-right">{{ $item->getHomeTown() }} </span><br>
                            Интересы: <span class="float-right">{{ $item->getInterests() }} </span><br>
                            В закладках ли у вас: <span class="float-right">{{ $item->getIsFavorite() }} </span><br>
                            Скрыт ли из ваших новостей: <span class="float-right">{{ $item->getIsHiddenFromFeed() }} </span><br>
                            Видимость для поисковиков: <span class="float-right">{{ $item->getIsNoIndex() }} </span><br>
                            Девичья фамилия: <span class="float-right">{{ $item->getMaidenName() }} </span><br>
                            Фильмы: <span class="float-right">{{ $item->getMovies() }} </span><br>
                            Музыка: <span class="float-right">{{ $item->getMusic() }} </span><br>
                            Никнейм (отчество): <span class="float-right">{{ $item->getNickname() }} </span><br>
                            Любимые цитаты: <span class="float-right">{{ $item->getQuotes() }} </span><br>
                            В тренде (огонек): <span class="float-right">{{ $item->getTrending() }} </span><br>
                            Любимые телешоу: <span class="float-right">{{ $item->getTv() }} </span><br>

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-lg">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Ваши заметки о профиле</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Действия:</div>
                            <a class="dropdown-item" href="#">Добавить</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    Действия: <br>
                    Добавить в отслеживание <br>
                    Добавить возможную связь с другим профилем (мультиакк)<br>
                    Отслеживать как часто связанные профили бывают одновременно в вк <br>
                    Включить/Отключить оповещения в ТГ <br>
                    Добавить/Удалить заметку <br>
                    Оповестить когда появится онлайн <br>
                    Сообщить о подозрении на бота <br>
                    Сообщить о подозрении на фейк <br>
                    Сообщить о нарушении <br>
                    Сообщить о мошенничестве <br>
                    Установить закрытых друзей <br>
                    Найти группы <br>
                    Добавить возможные связи, информацию (для получения данных из закрытого профиля) <br>
                    Найти последние лайки <br>
                    Общие друзья <br>
                    Найти ближайшие связи между вами <br>
                    ОБНОВИТЬ <br>
                    Добавить трекер <br>
                    Скрыть все неопределенные поля <br>
                    Узнать ID профиля по domain<br>
                    personal не отработан<br>
                    relatives не отработан<br>
                    military не отработан<br>
                    relation не отработан<br>
                    schools не отработан<br>
                    universities не отработан<br>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-header">
                    Название поля
                </div>
                <div class="card-body">
                    Дата начала: **********
                    <br>
                    Дата последней фиксации: ********
                    <br>
                    Начальный параметр: ***********
                    <br>
                    Конечный параметр: **********
                    <br>
                    <a href="#" class="btn btn-info btn-icon-split float-right">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-info-circle"></i>
                                        </span>
                        <span class="text">Детальный просмотр</span>
                    </a>
                </div>
            </div>
    </div>


    </div>


@endsection

@section('scripts')
    <!-- Page level custom scripts -->
    <script src="/js/demo/datatables-demo.js"></script>
@endsection

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

                            @foreach($icons as $key => $value)
                                <i class="{{$value[0]}}"></i> - {{$value[1]}} <br>
                            @endforeach

                            <i class="fas fa-signal text-success"></i>Онлайн <br>
                            <i class="fas fa-signal"></i></i>Оффлайн <br>
                            <i class="fas fa-hourglass-start text-success"></i> Был недавно <br>
                            <i class="fas fa-hourglass-end text-danger"></i>Был давно <br>
                            <i class="fas fa-solid fa-ban text-danger"></i>Забанен? <br>
                            <i class="fas fa-solid fa-trash text-danger"></i> Удален? <br>
                            <i class="fas fa-user-friends text-primary"></i> Является ли другом <br>
                            <i class="fas fa-ghost text-primary"></i> Подписаны ли вы <br>
                            <i class="fas fa-mask text-primary"></i> Подписан ли он <br>
                            <i class="fas fa-toilet-paper text-danger"></i> Находится ли в чс у вас <br>
                            <i class="fas fa-book-dead text-danger"></i> Находитесь ли в чс у него <br>
                            <i class="fas fa-eye text-success"></i> Добавлен ли в трекер? <br>
                            <i class="fas fa-star text-success"></i> Находится ли в избранном <br>
                        </div>
                        <div class="col-sm-8">
                            <p>
                                Имя: <span class="float-right">{{ $item->getFirstName() }} </span><br>
                                Фамилия: <span class="float-right">{{ $item->getLastName() }} </span><br>
                                Пол: <span class="float-right">{{ $item->getSex() }} </span><br>
                                Общих друзей: <span class="float-right">{{ $item->getCommonCount() }} </span><br>
                                Количество подписчиков: <span class="float-right">{{ $item->getFollowersCount() }} </span><br>
                                Город: <span class="float-right">{{ $item->getCity() }} </span><br>
                                Дата рождения: <span class="float-right">{{ $item->getBDate() }} </span><br>
                                Статус: <span class="float-right">{{ $item->getStatus() }} </span><br>
                            <hr>

                            <h6 class="text-primary">Онлайн</h6>
                                Последний раз онлайн: <span class="float-right">{{ $item->getLastPlatform() }} </span><br>
                                Дата: <span class="float-right">{{ $item->getLastSeenDate() }} </span><br>
                                Время: <span class="float-right">{{ $item->getLastSeenTime() }} </span><br>
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

                            <h6 class="text-primary">Occupation</h6>
                                Название: <span class="float-right">{{ $item->getOccupationName() }} </span><br>
                                Тип: <span class="float-right">{{ $item->getOccupationType() }} </span><br>
                                Год окончания: <span class="float-right">{{ $item->getGraduationYear() }} </span><br>
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

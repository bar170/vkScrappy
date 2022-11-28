@extends('dashboard.layouts.base')

@section('style')
    <link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('title')
    Группа - {{ $item->getId() }} ({{ $item->getScreenName() }})
@endsection

@section('main')

    <div class="row">
        <div class="col-lg-7">
            <div class="card mb-4">
                <div class="card-header">
                    <a href="https://vk.com/club{{$item->getId()}}">{{ $item->getName() }}</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <p><img src="{{ $item->getPhoto200() }}" alt="Ава200">
                            </p>
                            {{-- Вывод иконок состояний группы--}}

                        </div>
                        <div class="col-sm-8">
                            <p>
                                Имя: <span class="float-right">{{ $item->getName() }} </span><br>
                                Короткое имя: <span class="float-right">{{ $item->getScreenName() }} </span><br>
                                Тип: <span class="float-right">{{ $item->geType() }} </span><br>
                                Ваше отношение: <span class="float-right">{{ $item->getIsMember() }} </span><br>
                                Приватность: <span class="float-right">{{ $item->getIsClosed() }} </span><br>
                                Состояние: <span class="float-right">{{ $item->getState() }} </span><br>
                                Город: <span class="float-right">{{ $item->getCity() }} </span><br>
                                Страна: <span class="float-right">{{ $item->getCountry() }} </span><br>
                                Количество участников: <span class="float-right">{{ $item->getMembersCount() }} </span><br>
                                Сайт: <span class="float-right">{{ $item->getSite() }} </span><br>
                            <hr>
                            <h6 class="text-primary">Раскидать</h6>
                                Права админа: <span class="float-right">{{ $item->getIsAdmin() }} </span><br>
                                Возрастное ограничение: <span class="float-right">{{ $item->getAgeLimit() }} </span><br>
                                Описание: <span class="float-right">{{ $item->getDescriptions() }} </span><br>
                                Закрепленный пост: <span class="float-right">{{ $item->getFixedPost() }} </span><br>
                                Главная фотография: <span class="float-right">{{ $item->getHasPhoto() }} </span><br>
                                Находится ли в закладках: <span class="float-right">{{ $item->getIsFavorite() }} </span><br>
                                Скрыто ли сообщество из новостей: <span class="float-right">{{ $item->getIsHiddenFromFeed() }} </span><br>
                                Заблокированы ли сообщения от этого сообщества: <span class="float-right">{{ $item->getIsMessagesBlocked() }} </span><br>
                                start_date: <span class="float-right">{{ $item->getPublicDateLabel() }} </span><br>
                                Статус: <span class="float-right">{{ $item->getStatus() }} </span><br>
                                Тренд (огонек): <span class="float-right">{{ $item->getTrending() }} </span><br>
                                Верификация: <span class="float-right">{{ $item->getVerified() }} </span><br>
                                Стена: <span class="float-right">{{ $item->getWall() }} </span><br>
                            <hr>
                                <h6 class="text-primary">Доступы</h6>
                                Возможность создать новое обсуждение: <span class="float-right">{{ $item->getCanCreateTopic() }} </span><br>
                                Возможность написать сообщение сообществу: <span class="float-right">{{ $item->getCanMessage() }} </span><br>
                                Возможность оставлять записи на стене: <span class="float-right">{{ $item->getCanPost() }} </span><br>
                                Возможность видеть чужие записи на стене: <span class="float-right">{{ $item->getCanSeeAllPosts() }} </span><br>
                                Возможность загружать видеозаписи в группу: <span class="float-right">{{ $item->getCanUploadVideos() }} </span><br>

                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-lg">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Ваши заметки о группе</h6>
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
                    Сущность addresses <br>
                    Сущность addresses <br>
                    Сущность ban_info <br>
                    Сущность contacts <br>
                    Сущность counters <br>
                    Сущность fixed_post <br>
                    Сущность links <br>
                    Сущность market <br>
                    Сущность member_status <br>
                    Сущность place <br>
                    Сущность start_date + finish_date вобще сущность дата <br>

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

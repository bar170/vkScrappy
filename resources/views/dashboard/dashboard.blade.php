@extends('dashboard.layouts.base')

@section('title')
Панель управления
@endsection

@section('main')
    <div class="row">
    <div class="col-lg-5">

        <div class="card shadow mb-6">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardUpdateToken" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardUpdateToken">
                <h6 class="m-0 font-weight-bold text-primary">Синхронизация с ВК</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardUpdateToken" style="">
                <div class="card-body text-justify">
                    В соответствии с политикой конфиденциальности - сервис Vk-scrappy не имеет перманентного доступа к данным пользователя.
                    Поэтому периодически необходимо обновлять доступы к Вконтакте.<strong> Для комфортного использования - в разделе настроек отредактируйте права доступа сервиса к вашим данным Вконтакте.</strong>
                    После настройки доступов обновите токен.
                    <hr>
                    <a href="{{ $urlForCode }}" class="btn btn-secondary btn-icon-split ">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-solid fa-key"></i>
                                        </span>

                        <span class="text">Обновить токен</span>
                    </a>
                </div>
            </div>
        </div>

    </div>
    <div class="col-lg-4">

        <div class="card shadow mb-6">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardSearchUser" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardSearchUser">
                <h6 class="m-0 font-weight-bold text-primary">Детальный просмотр профиля</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardSearchUser" style="">
                <div class="card-body text-justify">
                    Введите id или domain интересующего профиля, если поле оставить пустым - перейдете на просмотр своей страницы
                    <hr>
                    <form class="d-none d-sm-inline-block form-inline mr-auto  my-2 my-md-0 mw-100 navbar-search"
                          method="GET" action="{{ route('user.detailForm') }}" >
                        @csrf
                        <div class="input-group">
                            <input type="text" name="idUser" class="form-control bg-light border-0 small" placeholder="ID или domain профиля...">
                            <div class="input-group-append">
                                <button class="btn btn-secondary" type="submit">
                                    Перейти
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
        <div class="col-lg-3">

            <div class="card shadow mb-6">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardNote" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardNote">
                    <h6 class="m-0 font-weight-bold text-primary">Заметки</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardNote" style="">
                    <div class="card-body text-justify">
                        Заметки: <br>

                        В настройках дать возможность установить "Давность посещения" <br>
                        Через account.getCounters оповещать о новых событиях <br>
                        Дать возможность выбирать. Либо оповещение висит обо всех событиях, либо только о новых<br>
                        Напоминалка о др друзей и тех людей, которых добавил в избранное<br>
                        Просто напоминалка о ДР и других делах<br>
                        Оповещать о действиях людей (в закладках вк) или при их появлении в сети<br>
                        Управление разрешениями, для трекеров нужен offline<br>
                        Показать порядок добавления друзей<br>

                        !!!!!!!! Разделить Entity на разные классы:<br>
                        Array, Array[с неизвестным количеством строк с новым array]<br>
                        Switch<br>
                        Простое поле<br>

                        Ктулху<br>
                        При попадании в сервис искать в друзьях пользователя цели и сохранять об них информацию<br>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

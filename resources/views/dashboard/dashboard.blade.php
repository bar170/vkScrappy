@extends('dashboard.layouts.base')

@section('title')
Панель управления
@endsection

@section('main')
    <div class="col-lg-6">

        <div class="card shadow mb-6">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardUpdateToken" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
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
                    <a href="{{ route('target.add') }}" class="btn btn-secondary btn-icon-split ">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-solid fa-key"></i>
                                        </span>

                        <span class="text">Подписаться</span>
                    </a>
                </div>
            </div>
        </div>

    </div>
@endsection

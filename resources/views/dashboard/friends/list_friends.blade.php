@extends('dashboard.layouts.base')

@section('style')
<link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('title')
    Список друзей
@endsection

@section('main')
    <div class="col-lg-9">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Всего: {{ $count }}</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Аватар</th>
                        <th>Имя</th>
                        <th>Фамилия</th>
                        <th>Пол</th>
                        <th>Тип профиля</th>
                        <th>Последний раз онлайн</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Аватар</th>
                        <th>Имя</th>
                        <th>Фамилия</th>
                        <th>Пол</th>
                        <th>Тип профиля</th>
                        <th>Последний раз онлайн</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach ($friends as $friend)
                    <tr>
                        <td> <a href="{{ route('user.detail', ['id' => $friend->getId()]) }}"> <img src="{{ $friend->getPhoto50() }}" alt="аватар 50"> </a> </td>
                        <td><a href="https://vk.com/id{{ $friend->getId() }}"> {{ $friend->getFirstName() }} </a></td>
                        <td>{{ $friend->getLastName() }}</td>
                        <td>{{ $friend->getSex() }}</td>
                        <td>{{ $friend->getIsClosed() }}</td>
                        <td>
                            <div>{{ $friend->getLastSeenDate() }} <span class="success"> {{ $friend->getLastSeenTime() }} </span>
                                <a href="{{ route('user.detail', ['id' => $friend->getId()]) }}" class="btn btn-light btn-icon-split float-right">
                                    <span class="icon text-gray-600">
                                        <i class="fas fa-arrow-right"></i>
                                    </span>
                                    <span class="text">Просмотр</span>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>

@endsection

@section('scripts')

    <!-- Page level custom scripts -->
    <script src="/js/demo/datatables-demo.js"></script>

@endsection

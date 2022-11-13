@extends('dashboard.layouts.base')

@section('style')
<link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('title')
    Список групп
@endsection

@section('main')
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
                        <th>Возможность написать</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Аватар</th>
                        <th>Имя</th>
                        <th>Фамилия</th>
                        <th>Пол</th>
                        <th>Тип профиля</th>
                        <th>Возможность написать</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach ($groups as $group)
                    <tr>
                        <td><img src="{{ $group->getPhoto50() }}" alt="ава"></td>
                        <td><a href="https://vk.com/club{{$group->getId()}}">{{ $group->getName() }}</a> </td>
                        <td> {{ $group->getScreenName() }} </td>
                        <td> {{ $group->getIsClosed() }} </td>
                        <td> {{ $group->geType() }} </td>
                        <td> {{ $group->getState() }} </td>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

    <!-- Page level custom scripts -->
    <script src="/js/demo/datatables-demo.js"></script>

@endsection

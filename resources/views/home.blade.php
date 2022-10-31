@extends('layouts.base')

@section('title')
    Панель управления
@endsection

@section('main')
<p class="text-right">
    <a href="{{ $urlForCode  }}">Обновить токен ВК</a>
    |
    <a href="{{ route('target.add') }}">Добавить цель</a>
    |
    <a href="">Друзья</a>
    |
    <a href="">Подписчики</a>
    |
    <a href="">Группы</a>
</p>
    @if (count($targets) > 0)
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Имя</th>
                <th>Пол</th>
                <th colspan="3"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($targets as $target)
                <tr>
                    <td><h3>{{ $target->name }}</h3></td>
                    <td>{{ $target->gender }}</td>
                    <td>
                        <a href="{{ route('detail', ['target' => $target->id]) }}">Подробнее</a>
                    </td>
                    <td>
                        <a href="">Изменить</a>
                    </td>
                    <td>
                        <a href="">Удалить</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection

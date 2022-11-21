@extends('layouts.base')

@section('menu')
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
@endsection

@section('main')
    @yield('dashboard')
@endsection

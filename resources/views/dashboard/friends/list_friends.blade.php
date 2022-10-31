@extends('dashboard.layouts.base')

@section('title')
    Список друзей
@endsection

@section('main')
    <div class="col-lg-6">
        <p>Всего - {{ $count}}</p>
        @foreach ($friends as $friend)
            <p>{{ $friend }}</p>
        @endforeach

    </div>

@endsection

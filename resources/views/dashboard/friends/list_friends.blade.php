@extends('dashboard.layouts.base')

@section('title')
    Список друзей
@endsection

@section('main')
    <div class="col-lg-6">
        <script>
            VK.Api.call('users.get', {user_ids: 6492, v:"5.73"}, function(r) {
                if(r.response) {
                    alert('Привет, ' + r.response[0].first_name);
                }
            });
        </script>
        <p>Всего - {{ $count}}</p>
        @foreach ($friends as $friend)
            <p>{{ $friend }}</p>
        @endforeach

    </div>

@endsection

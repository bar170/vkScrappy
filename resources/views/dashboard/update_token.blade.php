@extends('dashboard.layouts.base')

@section('title')
Обновление токена
@endsection

@section('main')
    <div class="col-lg-6">
    <br>
        <script>
            setTokenProp();
        </script>
    <h4>Токен успешно обновлён</h4> {{ $token }}
    </div>

@endsection

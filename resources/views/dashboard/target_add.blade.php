@extends('dashboard.layouts.base')

@section('title')
Мои подписки
@endsection

@section('main')
<form action="{{ route('target.store')  }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="txtName">Имя</label>
        <input name='name' id="txtName" class="form-control">
    </div>
    <div class="form-group">
        <label for="txtVk_id">id</label>
        <input name='vk_id' id="txtVk_id" class="form-control">
    </div>
    <input type="submit" class="btn btn-primary" value="Добавить">
</form>
@endsection

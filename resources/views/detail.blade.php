@extends('layouts.base')

@section('title')
    Мои цели
@endsection
@section('main')
    <h2>{{ $name }}</h2>
    <p> {{ $gender }}</p>
    <p> {{ $vk_id }}</p>
    <p> {{ $birthday }}</p>
    <p> {{ $link }}</p>
    <p> {{ $last_online }}</p>
    <p> {{ $probability_bot }}</p>
    <p> {{ $status_page_id }}</p>
    <p> {{ $location_id }}</p>
    <p><a href="{{ route('index') }}"> К списку целей </a></p>
@endsection


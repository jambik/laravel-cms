@extends('layouts.app')

@section('title', 'Личный кабинет - Заказы')

@section('content')
    @include('partials._personal_menu', ['ordersActive' => true])

    @include('partials._status')
    @include('partials._errors')

    <div class="no-items">- нет заказов -</div>
@endsection
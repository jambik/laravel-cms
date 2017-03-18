@extends('layouts.app')

@section('title', 'Мебель комфорта')

@section('content')
    @include('partials._status')
    @include('partials._errors')

    <h1>Поиск</h1>

    <div class="caption-block"><div>поиск по тексту <code>"{{ request('search') }}"</code></div></div>
    <hr>

    @if ($products->count())

        <div class="row products-list">
            @each('catalog.product_list', $products, 'product')
        </div>
    @endif
@endsection
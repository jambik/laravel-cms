@extends('layouts.app')

@section('title', $category->header ? ($category->header->title ?: $category->name) : $category->name)
@section('keywords', $category->header ? $category->header->keywords : '')
@section('description', $category->header ? $category->header->description : '')

@section('content')
    <ol class="breadcrumb">
        <li><a href="{{ route('catalog') }}">Каталог</a></li>
        @foreach ($category->ancestors()->get() as $value)
            <li><a href="{{ route('catalog.category', $value->slug) }}">{{ $value->name }}</a></li>
        @endforeach
        <li class="active">{{ $category->name }}</li>
    </ol>

    <h1>{{ $category->name }}</h1>

    {!! $category->about !!}

    <hr>

    @if ($children->count())
        <div class="row categories-list-line">
            @foreach($children as $category)
                <div class="col-lg-4">- <a href="{{ route('catalog.category', $category->slug) }}">{{ $category->name }}</a></div>
            @endforeach
        </div>
    @endif

    @if ($products->count())
        <div class="row products-tiles">
            @each('catalog.product_tile', $products, 'product')
        </div>
    @else
        <div class="no-items">В этой категории нет товаров</div>
    @endif
@endsection
@extends('layouts.app')

@section('title', $page->header ? ($page->header->title ?: $page->name) : 'Каталог')
@section('keywords', $page->header ? $page->header->keywords : '')
@section('description', $page->header ? $page->header->description : '')

@section('content')
    <h1>Каталог</h1>
    {!! $page ? $page->text : '' !!}
    <hr>
    <div class="row categories-list">
        @foreach($categories as $category)
            <div class="col-md-4 category">
                <div class="">
                    <a href="{{ route('catalog.category', $category->slug) }}">
                        <div class="img">
                            @if ($category->image)
                                <img src="/images/medium/{{ $category->img_url . $category->image }}" class="img-responsive img-thumbnail img-circle">
                            @else
                                <img src="/img/default.png" class="img-responsive img-thumbnail img-circle">
                            @endif
                        </div>
                        <div class="name">{{ $category->name }}</div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
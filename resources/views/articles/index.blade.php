@extends('layouts.app')

@section('title', $page->header ? ($page->header->title ?: $page->name) : 'Статьи')
@section('keywords', $page->header ? $page->header->keywords : '')
@section('description', $page->header ? $page->header->description : '')

@section('content')
    <h1>Статьи</h1>
    {!! $page ? $page->text : '' !!}
    <hr>
    @if ($articles->count())
        <div class="articles-list">
            @foreach($articles as $value)
                <div class="item">
                    <div class="name"><a href="{{ route('articles.show', $value->slug) }}">{{ $value->name }}</a></div>
                    <p>{{ str_limit(strip_tags($value->text), 150, '...') }}</p>
                </div>
            @endforeach
        </div>
    @else
        <div class="no-items">Раздел пока пуст</div>
    @endif

@endsection
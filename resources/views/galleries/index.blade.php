@extends('layouts.app')

@section('title', isset($page->header) && $page->header ? ($page->header->title ?: $page->name) : 'Фотогалерея')
@section('keywords', isset($page->header) && $page->header ? $page->header->keywords : '')
@section('description', isset($page->header) && $page->header ? $page->header->description : '')
@section('title', '')

@section('content')
    <h1>Фотогалереи</h1>
    {!! $page ? $page->text : '' !!}
    <hr>
    <div class="galleries-list">
        @if ($galleries->count())
            @foreach($galleries as $gallery)
                <div class="item media category">
                    <div class="media-left media-middle">
                        <div class="image"><a href="{{ url('/galleries/' . $gallery->slug) }}"><img src="{{ $gallery->image ? '/images/small/' . $gallery->img_url . $gallery->image : '/img/default.png' }}"></a></div>
                    </div>
                    <div class="media-body media-middle">
                        <div class="name"><a href="{{ url('/galleries/' . $gallery->slug) }}">{{ $gallery->name }}</a></div>
                        @if ($gallery->text)<p>{{ str_limit($gallery->text, 150, '...') }}</p>@endif
                    </div>
                </div>
            @endforeach
        @else
            <div class="no-items">Раздел пока пуст</div>
        @endif
    </div>

@endsection
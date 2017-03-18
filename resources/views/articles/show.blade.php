@extends('layouts.app')

@section('title', $item->header ? ($item->header->title ?: $item->name) : $item->name)
@section('keywords', $item->header ? $item->header->keywords : '')
@section('description', $item->header ? $item->header->description : '')

@section('content')
    <div><a href="{{ route('articles') }}"><i class="fa fa-chevron-left"></i> все статьи</a></div>
    <h1>{{ $item->name }}</h1>
    {!! $item->text !!}
@endsection
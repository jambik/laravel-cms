@extends('layouts.app')

@section('title', $page->header ? ($page->header->title ?: $page->name) : $page->name)
@section('keywords', $page->header ? $page->header->keywords : '')
@section('description', $page->header ? $page->header->description : '')

@section('slides')
    @include('partials._slides')
@endsection

@section('content')
    {!! $page->text !!}
@endsection
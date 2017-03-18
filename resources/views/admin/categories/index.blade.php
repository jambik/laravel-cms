@extends('admin.layouts.full')

@section('title', 'Администрирование - Категории')

@section('content')
    <h2 class="text-center">Категории</h2>

    <app-categories></app-categories>
@endsection

@section('head_scripts')

@endsection

@section('footer_scripts')
    <script src="/js/vue.js"></script>
@endsection
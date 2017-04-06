@extends('layouts.app')

@section('title', 'Корзина')
@section('keywords', '')
@section('description', '')

@section('content')
    @include('partials._status')
    @include('partials._errors')

    <h1>Корзина</h1>
    <hr>
    @if ($cart->count())
        <table id="cart" class="table table-stripped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Фото</th>
                    <th>Название</th>
                    <th>Цена</th>
                    <th>Количество</th>
                    <th>Сумма</th>
                    <th data-orderable="false" class="btn-collumn"></th>
                </tr>
            </thead>
            <tbody>
            @foreach($cart as $item)
                <tr>
                    <td><img src="/images/small/{{ $item->model->img_url . $item->model->image }}" class="img-responsive img-thumbnail"></td>
                    <td><a href="{{ route('catalog.product', $item->model->slug) }}">{{ $item->name }}</a></td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->qty }}</td>
                    <td>{{ $item->subtotal }}</td>
                    <td><a href="{{ route('cart.delete', $item->rowId) }}" class="btn btn-danger"><i class="fa fa-trash-o"></i></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <div class="no-items">корзина пуста</div>
    @endif
@endsection
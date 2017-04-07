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
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $item)
                    <tr>
                        <td><img src="/images/small/{{ $item->product->img_url . $item->product->image }}" class="img-responsive img-thumbnail"></td>
                        <td><a href="{{ route('catalog.product', $item->product->slug) }}">{{ $item->name }}</a></td>
                        <td>{{ number_format($item->price, 0, '.', ' ') }} руб.</td>
                        <td>
                            <button class="btn btn-sm btn-default">-</button>
                            <input style="width: 50px;" type="text" value="{{ $item->qty }}" />
                            <button class="btn btn-sm btn-default">+</button>
                        </td>
                        <td>{{ number_format($item->subtotal, 0, '.', ' ') }} руб.</td>
                        <td><a href="{{ route('cart.delete', $item->rowId) }}" class="btn btn-danger"><i class="fa fa-trash-o"></i></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="no-items">корзина пуста</div>
    @endif
@endsection
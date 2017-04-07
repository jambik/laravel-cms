@extends('layouts.app')

@section('title', $product->header ? ($product->header->title ?: $product->name) : $product->name)
@section('keywords', $product->header ? $product->header->keywords : '')
@section('description', $product->header ? $product->header->description : '')

@section('content')
    <ol class="breadcrumb">
        <li><a href="{{ url('/catalog') }}">Каталог</a></li>
        @foreach ($category->ancestors()->get() as $value)
            <li><a href="{{ route('catalog.category', $value->slug) }}">{{ $value->name }}</a></li>
        @endforeach
        <li class="active"><a href="{{ route('catalog.category', $category->slug) }}">{{ $category->name }}</a></li>
    </ol>

    <h1>{{ $product->name }}</h1>

    <div class="row product">
        <div class="col-lg-7 images">
            @if ($product->image)
                <a class="popup-gallery" title="{{ $product->name }}" href="/images/original/{{ $product->img_url . $product->image }}"><img src="/images/large/{{ $product->img_url . $product->image }}" class="img img-responsive" alt="{{ $product->name }}"></a>
            @else
                <img src="/img/default.png" class="img img-responsive">
            @endif

            @if ($product->photos->count())
                <p class="photos">
                    @foreach ($product->photos as $val)
                        <a class="popup-gallery" title="{{ $val->name }}" href="/images/original/{{ $val->img_url . $val->image }}"><img src="/images/small/{{ $val->img_url . $val->image }}" class="photo" alt="{{ $val->name }}"></a>
                    @endforeach
                </p>
            @endif
        </div>
        <div class="col-lg-5 info">
            <div class="price-calculate">
                <div class="price">
                    <strong>{{ number_format($product->price, 0, '.', ' ') }}</strong> руб.
                </div>
                <div class="add-cart">
                    <a href="{{ route('cart.add', ['id' => $product->id]) }}">
                        <i class="fa fa-cart-plus" aria-hidden="true"></i>
                        <span>Добавить<br>в&nbsp;корзину</span>
                    </a>
                </div>
                <div class="clearfix"></div>
            </div>

            @if ($product->material)
                <p class="property"><strong>Материал:</strong> {{ trans('vars.material')[$product->material] }}</p>
            @endif

            @if ($product->brief)
                <p class="brief">{{ $product->brief }}</p>
            @endif
        </div>
    </div>

    @if ($sameProducts->count())
        <div class="caption-block"><div>Похожие товары</div></div>
        <div class="row products-tiles">
            @each('catalog.product_tile', $sameProducts, 'product')
        </div>
    @endif

@endsection
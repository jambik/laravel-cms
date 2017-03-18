<div class="col-lg-4 col-md-6 col-sm-6">
    <div class="product-tile thumbnail">
        <div class="img">
            @if ($product->image)
                <a class="popup-product" title="{{ $product->name }}" href="/images/original/{{ $product->img_url . $product->image }}">
                    <img src="/images/large/{{ $product->img_url . $product->image }}" class="img-responsive">
                </a>
            @else
                <img src="/img/default.png" class="img-responsive">
            @endif
        </div>
        <div class="name"><a href="{{ route('catalog.product', $product->slug) }}">{{ $product->name }}</a></div>
        <div class="price">Цена: <span>{{ $product->price }} руб.</span></div>
        <div class="more text-center"><a href="{{ route('catalog.product', $product->slug) }}" class="btn">Подробнее</a></div>
    </div>
</div>
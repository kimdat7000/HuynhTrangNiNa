<div class="product">
    <div class="pic-product">
        <a class="scale-img img block aspect-[300/300]" href="{{ url('slugweb', ['slug' => $product['slugvi']]) }}"
            title="{{ $product['namevi'] }}">
            <img onerror="this.src='{{ thumbs('thumbs/300x300x1/assets/images/noimage.png') }}';"
                src="{{ assets_photo('product', '300x300x1', $product['photo'], 'thumbs') }}" alt="{{ $product['namevi'] }}">
        </a>
    </div>
    <h3 class="name-product">
        <a class="text-split text-decoration-none" href="{{ url('slugweb', ['slug' => $product['slugvi']]) }}"
            title="{{ $product['namevi'] }}">{{ $product['namevi'] }}</a>
    </h3>
    <p class="price-product">

        @if (empty($product->sale_price))
            @if (empty($product->regular_price))
                <span class="price-new">Liên hệ</span>
            @else
                <span class="price-new">{{ Func::formatMoney($product->regular_price) }}</span>
            @endif
        @else
        <span class="price-new">{{ Func::formatMoney($product->sale_price) }}</span>
            <span class="price-old">{{ Func::formatMoney($product->regular_price) }}</span>
        @endif
    </p>
</div>

@extends('layout')
@section('content')
    <section>
        <div class="wrap-content">
            <div class="grid-pro-detail">
                <div class="left-pro-detail">
                    <div class="slick_photo1  overflow-hidden">
                        <a id="Zoom-1" class="MagicZoom"
                            data-options="zoomMode: true; hint: off; rightClick: true; selectorTrigger: click; expandCaption: false; history: false;"
                            href="{{ assets_photo('product', '', $rowDetail['photo']) }}" title="{{ $rowDetail['namevi'] }}">
                            <img class=""
                                onerror="this.src='{{ thumbs('thumbs/710x440x1/assets/images/noimage.png') }}';"
                                src="{{ assets_photo('product', '710x440x1', $rowDetail['photo'], 'thumbs') }}"
                                alt="{{ $rowDetail['namevi'] }}">
                        </a>
                    </div>
                    <div class="album-product my-2 mt-3">
                        <div class="slick in-page" data-dots="0" data-infinite="0" data-arrows="0" data-autoplay='0'
                            data-slidesDefault="4:1" data-lg-items='4:1' data-md-items='4:1' data-sm-items='4:1'
                            data-xs-items="4:1" data-vertical="0">
                            <a class="thumb-pro-detail border-[1px] rounded-[8px]  mx-2" data-zoom-id="Zoom-1"
                                href="{{ assets_photo('product', '', $rowDetail['photo']) }}"
                                title="{{ $rowDetail['namevi'] }}"
                                data-image="{{ assets_photo('product', '710x440x1', $rowDetail['photo'], 'thumbs') }}"><img
                                    class=" !mb-0 !pb-0 !border-0"
                                    onerror="this.src='{{ thumbs('thumbs/710x440x1/assets/images/noimage.png') }}';"
                                    src="{{ assets_photo('product', '710x440x1', $rowDetail['photo'], 'thumbs') }}"
                                    alt="{{ $rowDetail['namevi'] }}"></a>
                            @foreach ($rowDetailPhoto as $v)
                                <a class="thumb-pro-detail border-[1px] rounded-[8px]  mx-2" data-zoom-id="Zoom-1"
                                    href="{{ assets_photo('product', '', $v['photo']) }}"
                                    title="{{ $rowDetail['namevi'] }}"
                                    data-image="{{ assets_photo('product', '710x440x1', $v['photo'], 'thumbs') }}"><img
                                        class=" !mb-0 !pb-0 !border-0"
                                        onerror="this.src='{{ thumbs('thumbs/710x440x1/assets/images/noimage.png') }}';"
                                        src="{{ assets_photo('product', '710x440x1', $v['photo'], 'thumbs') }}"
                                        alt="{{ $rowDetail['namevi'] }}"></a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="right-pro-detail">
                    <div class="title-pro-detail">
                        <h1>{{ $rowDetail['namevi'] }}</h1>
                    </div>
                    <div class="social-plugin w-clear mb-3">
                        @component('component.share')
                        @endcomponent
                    </div>
                    <ul class="attr-pro-detail">
                        <li class="flex mb-2 items-baseline">
                            <label class="attr-label-pro-detail font-medium mr-[5px]">Giá:</label>
                            <div class="attr-content-pro-detail">
                                @if ($rowDetail['sale_price'])
                                    <span
                                        class="price-new-pro-detail">{{ Func::formatMoney($rowDetail['sale_price']) }}</span>
                                    <span
                                        class="price-old-pro-detail">{{ Func::formatMoney($rowDetail['regular_price']) }}</span>
                                @else
                                    <span
                                        class="price-new-pro-detail">{{ $rowDetail['regular_price'] ? Func::formatMoney($rowDetail['regular_price']) : 'Liên hệ' }}</span>
                                @endif
                            </div>
                        </li>
                        @if (!empty($rowDetail['view'] ?? ''))
                            <li class=" mb-2 items-baseline">
                                <label class="attr-label-pro-detail font-medium mr-[5px]">View:</label>
                                <span>{{ $rowDetail['view'] }}</span>
                            </li>
                        @endif
                        @if (!empty($rowDetail['code'] ?? ''))
                            <li class=" mb-2 items-baseline">
                                <label class="attr-label-pro-detail font-medium mr-[5px]">Mã Sản Phẩm:</label>
                                <span>{{ $rowDetail['code'] }}</span>
                            </li>
                        @endif
                        <li>
                            {!! Func::decodeHtmlChars($rowDetail['desc' . $lang]) !!}
                        </li>
                    </ul>
                    {{-- <div class="cart-pro-detail">
                        <div class="attr-content-pro-detail d-block">
                            <div class="quantity-pro-detail">
                                <span class="quantity-minus-pro-detail">-</span>
                                <input type="text" class="qty-pro !outline-none !shadow-none !ring-0" min="1"
                                    value="1" readonly="">
                                <span class="quantity-plus-pro-detail">+</span>
                            </div>
                        </div>
                        <a class="transition addcart text-decoration-none addnow" data-id="{{ $rowDetail['id'] }}"
                            data-action="addnow">Thêm vào giỏ hàng</a>
                    </div>
                    <div class="cart-pro-detail">
                        <a class="transition flex-1 addcart text-decoration-none buynow" data-id="{{ $rowDetail['id'] }}"
                            data-action="buynow">
                            <span>Mua ngay</span>
                            <span>Gọi điện xác nhận và giao hàng tận nơi</span>
                        </a>
                    </div> --}}
                </div>
            </div>
            @if (!empty($rowDetail['content' . $lang]))
                <div class="noidung_pro_detail">
                    <div class="title-detail">
                        <span>{{ __('web.chitietsanpham') }}</span>
                    </div>

                    <div class="content-main baonoidung w-clear" id="toc-content"> {!! Func::decodeHtmlChars($rowDetail['content' . $lang]) !!}</div>
                </div>
            @endif

            @if (!empty($product))
                <div class="title-main mt-[40px]"><span>Sản phẩm tương tự</span></div>
                <div class="row-prod-flt -mx-[5px]">
                    <div class="owl-page owl-carousel owl-theme"
                    data-items="screen:0|items:4|margin:20"
                    data-rewind="1" data-autoplay="1" data-loop="0" data-lazyload="0" data-mousedrag="1"
                    data-touchdrag="1" data-smartspeed="500" data-autoplayspeed="3500" data-dots="0" data-nav="1"
                    data-navcontainer=".control-partner">
                        @foreach ($product as $v)
                            <div class="col-slick px-[5px]">
                                @component('component.itemProduct', ['product' => $v])
                                @endcomponent
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>
    @component('component.detailProduct', [
        'rowDetail' => $rowDetail ?? [],
        'rowDetailPhoto' => $rowDetailPhoto ?? [],
        'rowDetailPhoto1' => $rowDetailPhoto1 ?? [],
    ])
    @endcomponent
@endsection

@push('styles')
    <link rel="stylesheet" href="@asset('assets/magiczoomplus/magiczoomplus.css')">
@endpush
@push('scripts')
    <script src="@asset('assets/magiczoomplus/magiczoomplus.js')"></script>
@endpush

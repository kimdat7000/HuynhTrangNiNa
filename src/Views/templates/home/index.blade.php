@extends('layout')
@section('content')
<div class="gioi_thieu">
    <div class="wrap-content">
        <div class="row align-items-center">
            <div class="gioithieu_left col-6">
                <div class="mota_gioithieu">
                    <div class="title_gioithieu">
                        <p>Welcome to</p>
                        <p class="tieude_phu">CÔNG TY TNHH SẢN XUẤT Ô DÙ</p>
                        <p class="tieude">{{ $gioithieu['namevi'] }}</p>
                    </div>
                    <div class="noidung_gioithieu">
                        {!! Func::decodeHtmlChars($gioithieu['descvi']) !!}
                    </div>
                    <a class="xemthem_gioithieu text-decoration-none" href="gioi-thieu" title="Xem thêm">Xem thêm</a>
                </div>
            </div>
            <div class="gioithieu_right col-6">
                <div class="hinh_gioithieu">
                    <div class="hinh_gioithieu_1 aspect-[502/557]">
                        <img class="w-100" onerror="this.src='thumbs/502x557x1/assets/images/noimage.png';"
                            src="{{ assets_photo('news', '502x557x1', $gioithieu->photo, 'thumbs') }}"
                            alt="{{ $gioithieu['namevi'] }}" title="{{ $gioithieu['name' . $lang] }}">
                    </div>
                    <div class="hinh_gioithieu_2 aspect-[345/345]">
                        <img class="" onerror="this.src='thumbs/345x345x1/assets/images/noimage.png';"
                            src="{{ assets_photo('news', '345x345x1', $gioithieu->photo1, 'thumbs') }}"
                            alt="{{ $gioithieu['namevi'] }}" title="{{ $gioithieu['name' . $lang] }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@if ($listProductNB->isNotEmpty())
<div class="wrap-content pt-4 pb-4 ">
    <div class="title-main title-none">
        <h2>Sản phẩm ô dù</h2>
    </div>
    <div class="list-hot">
        @foreach ($listProductNB as $k => $v)
        <a class="{{ $k == 0 ? 'active' : '' }}" data-url="{{ url('load-product-list-home') }}"
            data-list="{{ $v->id }}"> {{ $v->namevi ?? '' }} </a>
        @endforeach
    </div>
    <div data-url="{{ url('load-product-list-home') }}" class="paging-product-hot mb-2"></div>
</div>
@endif
<div class="hinh_banner_qc">
    <a class=" text-decoration-none scale-img hover-img" href="{{ $bannerQC['link'] }}"
        title=" {{ $setting['name' . $lang] }}">
        <img class=" w-100" onerror="this.src='thumbs/1366x360x1/assets/images/noimage.png';"
            src="{{ assets_photo('photo', '1366x360x1', $bannerQC->photo, 'thumbs') }}"
            alt="{{ $setting['name' . $lang] }}" title="Banner quảng cáo">
    </a>
</div>
@if ($dichvu->isNotEmpty())
<div class="dich_vu padding-top-bottom">
    <div class="wrap-content">
        <div class="title-main">
            <h2>Dịch vụ chúng tôi</h2>
            <p>{{ $slogan['name' . $lang] }}</p>
        </div>
        <div class="owl-page owl-carousel owl-theme" data-items="screen:0|items:3|margin:20" data-rewind="1"
            data-autoplay="1" data-loop="0" data-lazyload="0" data-mousedrag="1" data-touchdrag="1"
            data-smartspeed="500" data-autoplayspeed="3500" data-dots="0" data-nav="1"
            data-navcontainer=".control-partner">
            @foreach ($dichvu as $k => $v)
            <div class="items_dichvu" data-aos="zoom-in" data-aos-duration="1000">
                <div class="box_dichvu">
                    <h3 class="name_dichvu ">
                        <a class=" text-decoration-none d-block text-split2"
                            href="{{ url('slugweb', ['slug' => $v['slugvi']]) }}"
                            title=" {{ $v['name' . $lang] }}"> {{ $v['name' . $lang] }}</a>
                    </h3>
                    <div class="hinh_dichvu">
                        <a class=" text-decoration-none scale-img hover-img"
                            href="{{ url('slugweb', ['slug' => $v['slugvi']]) }}"
                            title=" {{ $v['name' . $lang] }}">
                            <img class=" w-100" onerror="this.src='thumbs/365x265x1/assets/images/noimage.png';"
                                src="{{ assets_photo('news', '365x265x1', $v->photo, 'thumbs') }}"
                                alt="{{ $v['name' . $lang] }}" title="{{ $v['name' . $lang] }}">
                        </a>
                    </div>
                    <div class="text_dichvu">
                        <p class="mb-0 mota_dichvu text-split4">
                            {{ $v['desc' . $lang] }}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif
@if ($tieuchi->isNotEmpty())
<div class="tieu_chi padding-top-bottom">
    <div class="wrap-content">
        <div class="title-main title-white">
            <span>Vì sao chọn chúng tôi</span>
            <p>{{ $slogan['name' . $lang] }}</p>
        </div>
        <div class="d-flex justify-content-between align-items-center">
            <div class="tieuchi_left">
                @if(!empty($tieuchi[0]))
                <div class="box_tieuchi">
                    <div class="text_tieuchi">
                        <p class="mb-0 name_tieuchi">
                            {{ $tieuchi[0]['name' . $lang] }}
                        </p>
                        <p class="mb-0 mota_tieuchi text-split3">
                            {{ $tieuchi[0]['desc' . $lang] }}
                        </p>
                    </div>
                </div>
                @endif
                @if(!empty($tieuchi[1]))
                <div class="box_tieuchi">
                    <div class="text_tieuchi">
                        <p class="mb-0 name_tieuchi">
                            {{ $tieuchi[1]['name' . $lang] }}
                        </p>
                        <p class="mb-0 mota_tieuchi text-split3">
                            {{ $tieuchi[1]['desc' . $lang] }}
                        </p>
                    </div>
                </div>
                @endif
            </div>
            <div class="tieuchi_center aspect-[440/440]">
                <img class=" w-100 " onerror="this.src='thumbs/440x440x1/assets/images/noimage.png';"
                    src="{{ assets_photo('photo', '440x440x1', $imgTC->photo, 'thumbs') }}"
                    alt="{{ $setting['name' . $lang] }}" title="Hình tiêu chí">
            </div>
            <div class="tieuchi_right">
                @if(!empty($tieuchi[2]))
                <div class="box_tieuchi">
                    <div class="text_tieuchi">
                        <p class="mb-0 name_tieuchi">
                            {{ $tieuchi[2]['name' . $lang] }}
                        </p>
                        <p class="mb-0 mota_tieuchi text-split3">
                            {{ $tieuchi[2]['desc' . $lang] }}
                        </p>
                    </div>
                </div>
                @endif
                @if(!empty($tieuchi[3]))
                <div class="box_tieuchi">
                    <div class="text_tieuchi">
                        <p class="mb-0 name_tieuchi">
                            {{ $tieuchi[3]['name' . $lang] }}
                        </p>
                        <p class="mb-0 mota_tieuchi text-split3">
                            {{ $tieuchi[3]['desc' . $lang] }}
                        </p>
                    </div>
                </div>
                @endif
            </div>

        </div>
    </div>
</div>
@endif
@if ($tintuc->isNotEmpty())
<div class="tin_tuc padding-top-bottom">
    <div class="wrap-content">
        <div class="title-main title-none">
            <h2>Tin tức & sự kiện</h2>
            <p>{{ $slogan['name' . $lang] }}</p>
        </div>
        <div class="owl-page owl-carousel owl-theme" data-items="screen:0|items:4|margin:20" data-rewind="1"
            data-autoplay="1" data-loop="0" data-lazyload="0" data-mousedrag="1" data-touchdrag="1"
            data-smartspeed="500" data-autoplayspeed="3500" data-dots="0" data-nav="1"
            data-navcontainer=".control-partner">
            @foreach ($tintuc as $k => $v)
            <div class="items_tintuc" data-aos="zoom-in" data-aos-duration="1000">
                <div class="box_tintuc">
                    <div class="hinh_tintuc">
                        <a class=" text-decoration-none scale-img hover-img aspect-[285/270]"
                            href="{{ url('slugweb', ['slug' => $v['slugvi']]) }}"
                            title=" {{ $v['name' . $lang] }}">
                            <img class=" w-100"
                                onerror="this.src='thumbs/285x270x1/assets/images/noimage.png';"
                                src="{{ assets_photo('news', '285x270x1', $v->photo, 'thumbs') }}"
                                alt="{{ $v['name' . $lang] }}" title="{{ $v['name' . $lang] }}">
                        </a>
                    </div>
                    <div class="text_tintuc">
                        <h3 class="name_tintuc ">
                            <a class=" text-decoration-none d-block text-split2"
                                href="{{ url('slugweb', ['slug' => $v['slugvi']]) }}"
                                title=" {{ $v['name' . $lang] }}"> {{ $v['name' . $lang] }}</a>
                        </h3>

                        <p class="mb-0 mota_tintuc text-split3">
                            {{ $v['desc' . $lang] }}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif
@if ($doitac->isNotEmpty())
<div class="doi_tac padding-top-bottom">
    <div class="wrap-content">
        <div class="owl-page owl-carousel owl-theme" data-items="screen:0|items:6|margin:10" data-rewind="1"
            data-autoplay="1" data-loop="0" data-lazyload="0" data-mousedrag="1" data-touchdrag="1"
            data-smartspeed="500" data-autoplayspeed="3500" data-dots="0" data-nav="1"
            data-navcontainer=".control-partner">
            @foreach ($doitac as $k => $v)
            <div class="items_doitac" data-aos="zoom-in" data-aos-duration="1000">
                <div class="box_doitac">
                    <div class="hinh_doitac">
                        <a class=" text-decoration-none scale-img hover-img aspect-[190/130]"
                            href="{{ url('slugweb', ['slug' => $v['slugvi']]) }}"
                            title=" {{ $v['name' . $lang] }}">
                            <img class=" w-100"
                                onerror="this.src='thumbs/190x130x1/assets/images/noimage.png';"
                                src="{{ assets_photo('photo', '190x130x1', $v->photo, 'thumbs') }}"
                                alt="{{ $v['name' . $lang] }}" title="{{ $v['name' . $lang] }}">
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif
@endsection
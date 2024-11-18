<footer>
    <div class="footer-article">
        <div class="wrap-content flex flex-wrap items-start justify-between">
            <div class="footer-news">
                <a class="logo-footer d-inline-block" href="">
                    <img src="{{ assets_photo('photo', '176x176x2', $logoPhotoFooter->photo, 'thumbs') }}"
                        alt="{{ $setting['name' . $lang] }}">
                </a>
                <div class="info-footer">{!! Func::decodeHtmlChars($logoPhotoFooter['desc' . $lang] ?? '') !!}</div>
            </div>
            <div class="footer-news">
                <p class="name-tt-footer">
                    Công ty tnhh sản xuất ô dù
                </p>
                <h2 class="name-footer">
                    {{ $footer['name' . $lang] }}
                </h2>
                <div class="info-footer">{!! Func::decodeHtmlChars($footer['content' . $lang] ?? '') !!}</div>
            </div>
            <div class="footer-news">
                <h3 class="title-footer">Chính sách khách hàng</h3>
                @if ($chinhsach->isNotEmpty())
                    <ul class="footer-ul p-0 m-0 list-none">
                        @foreach ($chinhsach as $v)
                            <li class="last:mb-0">
                                <h4 class="mb-0">
                                    <a class="d-block text-decoration-none "
                                        href="{{ url('slugweb', ['slug' => $v->slugvi]) }}">{{ $v->namevi }}</a>
                                </h4>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
            <div class="footer-news">
                <h3 class="title-footer">Fanpage</h3>
                @if (!Func::isGoogleSpeed())
                    <div class="d-fanpage">
                        <div class="content-fanpage">
                            @component('component.fanpage', ['fanpage' => $optSetting['fanpage']])
                            @endcomponent
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="footer-powered">
            <div class="wrap-content">
                <p class="copyright mb-0">Copyright ©<span>{{ $copyright['name' . $lang] ?? '' }}</span>. Designed by <span>Nina.vn</span></p>
            </div>
        </div>
    </div>

    @if (!Func::isGoogleSpeed())
        <div class="d-maps">
            {!! Func::decodeHtmlChars($optSetting['coords_iframe'] ?? '') !!}
        </div>
    @endif
</footer>

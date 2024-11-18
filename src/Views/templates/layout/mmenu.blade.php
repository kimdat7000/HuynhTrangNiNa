<div class="menu-res">
    <div class="menu-bar-res d-flex align-items-center justify-content-between ">
        <a id="hamburger" href="#menu" title="Menu"><span></span></a>
        <a class="logo-header" href="">
            <img src="{{ assets_photo('photo', '100x50x2', $logoPhoto->photo, 'thumbs') }}" alt="{{ $setting->namevi }}">
        </a>
        <div class="search-res">
            <p class="icon-search transition"><i class="fa-regular fa-magnifying-glass"></i></p>
            <div class="search-grid d-flex ">
                <p onclick="onSearch('keyword-res');"><i class="fa-regular fa-magnifying-glass"></i></p>
                <input type="text" name="keyword-res" id="keyword-res" placeholder="{{ __('web.timkiemsanpham') }}"
                    onkeypress="doEnter(event,'keyword-res');" value="{{ $_GET['keyword'] ?? '' }}" />
            </div>
        </div>
    </div>
</div>

<nav id="menu">
    <ul>

       <li><a class="transition {{ ($com ?? '') == '' ? 'active' : '' }}" href=""
                        title="{{ __('web.home') }}">{{ __('web.home') }}</a>
                </li>
                @if ($listProductMenu->isNotEmpty())
                    @foreach ($listProductMenu ?? [] as $vlist)
                        <li class="group">
                            <a class="transition {{ ($idList ?? 0) == $vlist->id ? 'active' : '' }}"
                                href="{{ url('slugweb', ['slug' => $vlist->slugvi]) }}"
                                title="{{ $vlist->namevi }}">{{ $vlist->namevi }}</a>
                            @if ($vlist->getCategoryCats->isNotEmpty())
                                <ul>
                                    @foreach ($vlist->getCategoryCats as $vcat)
                                        <li>
                                            <a class="transition" href="{{ url('slugweb', ['slug' => $vcat->slugvi]) }}"
                                                title="{{ $vcat->namevi }}">{{ $vcat->namevi }}</a>
                                            @if ($vcat->getCategoryItems->isNotEmpty())
                                                <ul>
                                                    @foreach ($vcat->getCategoryItems as $vitem)
                                                        <li>
                                                            <a class="transition"
                                                                href="{{ url('slugweb', ['slug' => $vitem->slugvi]) }}"
                                                                title="{{ $vitem->namevi }}">{{ $vitem->namevi }}</a>
                                                            @if ($vitem->getCategorySubs->isNotEmpty())
                                                                <ul>
                                                                    @foreach ($vitem->getCategorySubs as $vsub)
                                                                        <li>
                                                                            <a class="transition"
                                                                                href="{{ url('slugweb', ['slug' => $vsub->slugvi]) }}"
                                                                                title="{{ $vsub->namevi }}">{{ $vsub->namevi }}</a>

                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            @endif
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
                @endif
                <li class="li_tab_menu"><a class="transition {{ ($com ?? '') == 'du-an' ? 'active' : '' }}"
                        href="{{ url('du-an') }}" title="Dự án">Dự án</a>
                </li>
                <li><a class="transition {{ ($com ?? '') == 've-chung-toi' ? 'active' : '' }}"
                        href="{{ url('ve-chung-toi') }}" title="Về chúng tôi">Về chúng tôi</a>
                </li>
    </ul>
</nav>

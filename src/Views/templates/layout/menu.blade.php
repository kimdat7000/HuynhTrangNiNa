<div class="w-menu">
    <div class="menu ">
        <div class="wrap-content">
            <div class="d-flex justify-content-between align-items-center">
                <ul class="flex flex-wrap items-center justify-between ulmn">
                    <li><a class="transition {{ ($com ?? '') == 'trang-chu' ? 'active' : '' }}" href=""
                            title="{{ __('web.home') }}">{{ __('web.home') }}</a>
                    </li>
                    <li><a class="transition {{ ($com ?? '') == 'gioi-thieu' ? 'active' : '' }}"
                            href="{{ url('gioi-thieu') }}" title="{{ __('web.gioithieu') }}">{{ __('web.gioithieu') }}</a>
                    </li>
                    <li>
                        <a class="transition {{ ($com ?? '') == 'san-pham' ? 'active' : '' }}" href="{{ url('san-pham') }}"
                            title="{{ __('web.sanpham') }}">{{ __('web.sanpham') }}</a>
                        @if ($listProductMenu->isNotEmpty())
                            <ul>
                                @foreach ($listProductMenu ?? [] as $vlist)
                                    <li class="group">
                                        <a class="transition {{ ($idList ?? 0) == $vlist->id ? 'active' : '' }}"
                                            href="{{ url('slugweb', ['slug' => $vlist->slugvi]) }}"
                                            title="{{ $vlist->namevi }}">{{ $vlist->namevi }}</a>
                                        @if ($vlist->getCategoryCats->isNotEmpty())
                                            <ul>
                                                @foreach ($vlist->getCategoryCats as $vcat)
                                                    <li>
                                                        <a class="transition"
                                                            href="{{ url('slugweb', ['slug' => $vcat->slugvi]) }}"
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
                            </ul>
                        @endif
                    </li>
                    <li class="group"><a class="transition {{ ($com ?? '') == 'dich-vu' ? 'active' : '' }}"
                        href="{{ url('dich-vu') }}" title="Dịch vụ">Dịch vụ</a>
                    </li>
                    <li class="li_tab_menu"><a class="transition {{ ($com ?? '') == 'tin-tuc' ? 'active' : '' }}"
                            href="{{ url('tin-tuc') }}" title="{{ __('web.tintuc') }}">{{ __('web.tintuc') }}</a>
                    </li>
                    <li class="group"><a class="transition {{ ($com ?? '') == 'lien-he' ? 'active' : '' }}"
                            href="{{ url('lien-he') }}" title="{{ __('web.lienhe') }}">{{ __('web.lienhe') }}</a>
                    </li>
                </ul>
                <div class="search">
                    <div class="flex items-center justify-between">
                        <input type="text" id="keyword" class="search-auto flex-1" placeholder="Tìm kiếm"
                            onkeypress="doEnter(event,'keyword');" title="search">
                        <p class="mb-0" onclick="onSearch('keyword');"><i class="fal fa-search"></i></p>
                    </div>
                    <div class="show-search"></div>
                </div>
            </div>
        </div>
    </div>
</div>

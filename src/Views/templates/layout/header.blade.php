<div class="header">

    <div class="head-bottom">
        <div class="wrap-content">
            <div class="d-flex justify-content-between align-items-center">
                <a class="logo-head d-inline-block" href="">
                    <img src="{{ assets_photo('photo', '108x66x2', $logoPhoto->photo, 'thumbs') }}"
                        alt="{{ $setting->namevi }}">
                </a>
                <a class="banner-head d-inline-block" href="">
                    <img src="{{ assets_photo('photo', '363x92x2', $bannerPhoto->photo, 'thumbs') }}"
                        alt="{{ $setting->namevi }}">
                </a>
                <div class="box_hotline">
                    <div class="icon_hotline">
                        <img src="assets/images/main/icon-hotline.png" alt="">
                    </div>
                    <div class="text_hotline">
                        <span class="title d-block">Hotline:</span>
                        <span class="number d-block">{{ Func::formatPhone($optSetting['hotline'], ' ') }}</span>
                    </div>
                </div>
                <div class="box_hotline">
                    <div class="icon_hotline">
                        <img src="assets/images/main/icon-mail.png" alt="">
                    </div>
                    <div class="text_hotline">
                        <span class="title d-block">Email:</span>
                        <span class="text d-block">{{ $optSetting['email']}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

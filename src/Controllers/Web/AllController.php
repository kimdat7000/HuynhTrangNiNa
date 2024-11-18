<?php

/******************************************************************************
 * NINA VIỆT NAM
 * Email: nina@nina.vn
 * Website: nina.vn
 * Version: 1.1.1 
 * Date 18-09-2024
 * Đây là tài sản của CÔNG TY TNHH TM DV NINA. Vui lòng không sử dụng khi chưa được phép.
 */

namespace NINA\Controllers\Web;

use NINA\Controllers\Controller;
use NINA\Models\PhotoModel;
use NINA\Models\SettingModel;
use NINA\Models\NewsModel;
use NINA\Models\StaticModel;
use NINA\Models\ExtensionsModel;
use NINA\Models\ProductListModel;
use NINA\Models\ProductCatModel;
use NINA\Core\Container;

class AllController extends Controller
{

    function composer($view): void
    {
        $lang = session()->get('locale');
        $extHotline = '';
        $photos = PhotoModel::select('photo', 'namevi','descvi', 'link', 'type')
            ->whereIn('type', ['logo', 'logoft', 'favicon', 'social', 'mangxahoi1','banner'])
            ->whereRaw("FIND_IN_SET(?, status)", ['hienthi'])
            ->get();

        $logoPhoto = $photos->where('type', 'logo')->first();
        $logoPhotoFooter = $photos->where('type', 'logoft')->first();
        $bannerPhoto = $photos->where('type', 'banner')->first();
        $favicon = $photos->where('type', 'favicon')->first();
        $social = $photos->where('type', 'social');

        $Static = StaticModel::select('namevi', 'nameen', 'photo', 'descvi', 'descen', 'contentvi', 'contenten', 'slugvi', 'type', 'status', 'id')
            ->whereIn('type', ['footer', 'copyright', 'slogan'])
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])->get();
            
        $slogan = $Static->where('type', 'slogan')->first();
        $footer = $Static->where('type', 'footer')->first();
        $copyright = $Static->where('type', 'copyright')->first();

        $listProductMenu = ProductListModel::select('namevi', 'photo', 'slugvi', 'id')
            ->with(['getCategoryCats:id_list,namevi,nameen,slugvi,id', 'getCategoryCats.getCategoryItems:id_cat,namevi,nameen,slugvi,id', 'getCategoryItems.getCategorySubs:id_item,namevi,nameen,slugvi,id'])
            ->where('type', 'san-pham',)
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->orderBy('numb', 'asc')
            ->get();

        $chinhsach = NewsModel::select('namevi', 'slugvi')
            ->where('type', 'chinh-sach')
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->get();

        $extHotline = ExtensionsModel::select('*')
            ->where('type', 'hotline')
            ->first();

        $extSocial = ExtensionsModel::select('*')
            ->where('type', 'social')
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->first();

        $extPopup = ExtensionsModel::select('*')
            ->where('type', 'popup')
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->first();

        $setting = SettingModel::first();
        $optSetting = json_decode($setting['options'], true);
        $configType = json_decode(json_encode(config('type')));

        $com = $this->type;
        $view->share(compact(
            'configType',
            'logoPhoto',
            'logoPhotoFooter',
            'bannerPhoto',
            'favicon',
            'setting',
            'optSetting',
            'listProductMenu',
            'social',
            'footer',
            'slogan',
            'copyright',
            'extHotline',
            'extSocial',
            'extPopup',
            'lang',
            'com',
            'chinhsach'
        ));
    }
}

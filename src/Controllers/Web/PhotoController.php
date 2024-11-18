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
use NINA\Core\Support\Facades\Seo;
use NINA\Core\Support\Facades\View;
use Illuminate\Http\Request;
use NINA\Models\PhotoModel;
use NINA\Core\Support\Facades\BreadCrumbs;


class PhotoController extends Controller
{
    public function index()
    {
        $photo = PhotoModel::select('id', 'namevi', 'nameen', 'descvi', 'descen', 'photo', 'link')
            ->where('type', $this->type)
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->orderBy('numb', 'desc')
            ->orderBy('id', 'desc')
            ->get();
        $titleMain = "Bảng màu";
        BreadCrumbs::setBreadcrumb(type: $this->type, title: $titleMain);
        $this->seoPage($titleMain, $this->infoSeo('photo', $this->type, 'type', 'index'));
        return View::share(['com' => $this->type])->view('photo.photo', compact('photo', 'titleMain'));
    }

    public function detail($slug)
    {
        $rowDetail = NewsModel::select('type', 'id', 'namevi', 'nameen', 'slugvi', 'slugen', 'descvi', 'descen', 'contentvi', 'contenten', 'view', 'id_list', 'id_cat', 'id_item', 'id_sub', 'photo', 'options')
            ->where(function ($query) use ($slug) {
                $query->where("slugvi", $slug)->orwhere("slugen", $slug);
            })
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->first();
        $seoPage = $rowDetail->getSeo('news', 'save')->first();
        Seo::setSeoData($seoPage, 'news', 'seo');
        $rowDetailPhoto = $rowDetail->getPhotos('news')->get();
        $tags = $rowDetail->tags ?? [];
        $itemList = $rowDetail->getCategoryList;
        $itemCat = $rowDetail->getCategoryCat;
        $itemItem = $rowDetail->getCategoryItem;
        $itemSub = $rowDetail->getCategorySub;
        if (!empty($this->infoSeo('news', $rowDetail->type, 'title'))) BreadCrumbs::set(url('slugweb', ['slug' => $rowDetail->type]), __("web." . $this->infoSeo('news', $rowDetail->type, 'title')));
        BreadCrumbs::setBreadcrumb(detail: $rowDetail, list: $itemList, cat: $itemCat, item: $itemItem, sub: $itemSub);
        $news = NewsModel::select('id', 'namevi', 'photo', 'descvi', 'slugvi')
            ->where(['type' => $rowDetail['type'], 'id_list' => $rowDetail->id_list])
            ->where("id", "!=", $rowDetail['id'])
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->get();
        return View::share('com', $rowDetail->type)->view('news.detail', compact('rowDetail', 'rowDetailPhoto', 'news', 'tags'));
    }
}

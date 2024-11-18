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

use Illuminate\Http\Request;
use NINA\Core\Support\Facades\View;
use NINA\Core\Support\Facades\BreadCrumbs;
use NINA\Controllers\Controller;
use NINA\Core\Support\Facades\Seo;
use NINA\Models\NewsModel;
use NINA\Models\ProductModel;
use NINA\Models\ProductListModel;
use NINA\Models\ProductCatModel;
use NINA\Models\ProductItemModel;
use NINA\Models\ProductSubModel;
use NINA\Models\PropertiesListModel;

class ProductController extends Controller
{

    public function index(Request $request)
    {
        $product = $this->productItem('', $request, $this->type);
        $titleMain =  $this->infoSeo('product', $this->type, 'title');
        $titleMain = __('web.' . $titleMain);
        BreadCrumbs::setBreadcrumb(type: $this->type, title: $titleMain);
        $this->seoPage($titleMain, $this->infoSeo('product', $this->type, 'type', 'index'));
        return View::share(['com' => $this->type])->view('product.product', compact('product', 'titleMain'));
    }

    public function list($slug, Request $request)
    {
        $itemList = ProductListModel::select('id', 'namevi', 'nameen', 'descvi', 'descen', 'slugvi', 'slugen', 'photo', 'type')
            ->where(function ($query) use ($slug) {
                $query->where("slugvi", $slug)->orwhere("slugen", $slug);
            })
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->first();

        $listProperties =  $this->searchListProperties($itemList['id']);

        $this->type =  $itemList->type;
        $titleMain = $itemList['name' . $this->lang];
        $titleCatellory = $this->infoSeo('product', $itemList->type, 'title');
        $titleCatellory = __('web.' . $titleCatellory);

        if ($this->infoSeo('product', $itemList->type, 'type', 'index')) BreadCrumbs::set(url('slugweb', ['slug' => $itemList->type]), $titleCatellory );
        BreadCrumbs::setBreadcrumb(list: $itemList);
        $product = $this->productItem($itemList, $request);
        $seoPage = $itemList->getSeo('product-list', 'save')->first();
        $seoPage['type'] = $this->infoSeo('product', $this->type, 'type', 'index');
        Seo::setSeoData($seoPage, 'product', 'seo');
        return View::share(['idList' => $itemList['id'], 'com' => $this->type])->view('product.product', compact('product', 'titleMain', 'listProperties'));
    }

    public function cat($slug, Request $request)
    {
        $itemCat = ProductCatModel::select('id', 'id_list', 'namevi', 'nameen', 'descvi', 'descen', 'slugvi', 'slugen', 'photo', 'id_list', 'type')
            ->where(function ($query) use ($slug) {
                $query->where("slugvi", $slug)->orwhere("slugen", $slug);
            })
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->first();
        $listProperties =  $this->searchListProperties($itemCat['id_list']);
        $this->type =  $itemCat->type;
        $titleMain = $itemCat['name' . $this->lang];
        $titleCatellory = $this->infoSeo('product', $itemCat->type, 'title');
        $titleCatellory = __('web.' . $titleCatellory);

        $itemList = $itemCat->getCategoryList;
        if ($this->infoSeo('product', $itemCat->type, 'type', 'index')) BreadCrumbs::set(url('slugweb', ['slug' => $itemCat->type]), $titleCatellory);
        BreadCrumbs::setBreadcrumb(list: $itemList, cat: $itemCat);
        $product = $this->productItem($itemCat, $request);
        $seoPage = $itemCat->getSeo('product-cat', 'save')->first();
        $seoPage['type'] = $this->infoSeo('product', $this->type, 'type', 'index');
        Seo::setSeoData($seoPage, 'product', 'seo');
        return View::share(['com' => $this->type])->view('product.product', compact('product', 'titleMain', 'listProperties'));
    }

    public function item($slug, Request $request)
    {
        $itemItem = ProductItemModel::select('id', 'id_list', 'namevi', 'nameen', 'descvi', 'descen', 'slugvi', 'slugen', 'photo', 'id_list', 'id_cat', 'type')
            ->where(function ($query) use ($slug) {
                $query->where("slugvi", $slug)->orwhere("slugen", $slug);
            })
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->first();
        $listProperties =  $this->searchListProperties($itemItem['id_list']);
        $this->type =  $itemItem->type;
        $titleMain = $itemItem['name' . $this->lang];
        $itemList = $itemItem->getCategoryList;
        $itemCat = $itemItem->getCategoryCat;
        $titleCatellory = $this->infoSeo('product', $itemItem->type, 'title');
        $titleCatellory = __('web.' . $titleCatellory);

        if ($this->infoSeo('product', $itemItem->type, 'type', 'index')) BreadCrumbs::set(url('slugweb', ['slug' => $itemItem->type]), $titleCatellory);
        BreadCrumbs::setBreadcrumb(list: $itemList, cat: $itemCat, item: $itemItem);
        $product = $this->productItem($itemItem, $request);
        $seoPage = $itemItem->getSeo('product-item', 'save')->first();
        $seoPage['type'] = $this->infoSeo('product', $this->type, 'type', 'index');
        Seo::setSeoData($seoPage, 'product', 'seo');
        return View::share(['com' => $this->type])->view('product.product', compact('product', 'titleMain', 'listProperties'));
    }
    public function sub($slug, Request $request)
    {
        $itemSub = ProductSubModel::select('id', 'namevi', 'nameen', 'descvi', 'descen', 'slugvi', 'slugen', 'photo', 'id_list', 'id_cat', 'id_item', 'type')
            ->where(function ($query) use ($slug) {
                $query->where("slugvi", $slug)->orwhere("slugen", $slug);
            })
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->first();

        $this->type =  $itemSub->type;
        $titleMain = $itemSub['name' . $this->lang];
        $titleCatellory = $this->infoSeo('product', $itemSub->type, 'title');
        $titleCatellory = __('web.' . $titleCatellory);
        $itemList = $itemSub->getCategoryList;
        $itemCat = $itemSub->getCategoryCat;
        $itemItem = $itemSub->getCategoryItem;
        if ($this->infoSeo('product', $itemSub->type, 'type', 'index')) BreadCrumbs::set(url('slugweb', ['slug' => $itemSub->type]), $titleCatellory);
        BreadCrumbs::setBreadcrumb(list: $itemList, cat: $itemCat, item: $itemItem, sub: $itemSub);
        $product = $this->productItem($itemSub, $request);
        $seoPage = $itemSub->getSeo('product-sub', 'save')->first();
        $seoPage['type'] = $this->infoSeo('product', $this->type, 'type', 'index');
        Seo::setSeoData($seoPage, 'product', 'seo');
        return View::share(['com' => $this->type])->view('product.product', compact('product', 'titleMain'));
    }
    public function detail($slug)
    {
        $rowDetail = ProductModel::select('type', 'id', 'id_list', 'properties', 'namevi', 'nameen', 'slugvi', 'slugen', 'descvi', 'descen', 'contentvi', 'contenten', 'parametervi', 'parameteren', 'incentivesvi', 'incentivesen', 'promotionvi', 'promotionen', 'code', 'view', 'id_brand', 'id_list', 'id_cat', 'id_item', 'id_sub', 'photo', 'options', 'sale_price', 'regular_price', 'type', 'discount', 'view')->where(function ($query) use ($slug) {
            $query->where("slugvi", $slug)->orwhere("slugen", $slug);
        })->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])->first();
        if (!empty($rowDetail)) $rowDetail->increment('view');

        $query = PropertiesListModel::select('type', 'id', 'namevi')
            ->where('type', 'san-pham')
            ->whereRaw("FIND_IN_SET(?,status)", ['cart']);

        if (!empty(config('type.categoriesProperties'))) $query->whereRaw("FIND_IN_SET(?,id_list)", [$rowDetail['id_list']]);
        $listProperties = $query->orderBy('numb', 'asc')->get()->map(fn($v) => [$v, $v->getProperties()->whereIn('id',  explode(',', $rowDetail['properties']))->get()]);

        $this->type =  $rowDetail->type;
        $seoPage = $rowDetail->getSeo('product', 'save')->first();

        $seoPage['type'] = $this->infoSeo('product', $this->type, 'type', 'detail');

        Seo::setSeoData($seoPage, 'product', 'seo');

        $rowDetailPhoto = $rowDetail->getPhotos('product')->where('type', 'san-pham')->get();
        $rowDetailPhoto1 = $rowDetail->getPhotos('product')->where('type', 'hinh-anh')->get();

        $rowNews = $rowDetail->getNews()->get();

        $tags = $rowDetail->tags ?? [];

        $titleCatellory = $this->infoSeo('product', $rowDetail->type, 'title');
        $titleCatellory = __('web.' . $titleCatellory);

        if ($this->infoSeo('product', $rowDetail->type, 'type', 'index')) BreadCrumbs::set(url('slugweb', ['slug' => $rowDetail->type]), $titleCatellory);
        BreadCrumbs::setBreadcrumb(detail: $rowDetail, list: $rowDetail->getCategoryList, cat: $rowDetail->getCategoryCat, item: $rowDetail->getCategoryItem, sub: $rowDetail->getCategorySub);

        $query = ProductModel::select('id', 'namevi', 'photo', 'descvi', 'slugvi', 'regular_price', 'discount', 'sale_price')->where('type', 'san-pham');
        if (!empty($rowDetail['id_list'])) $query->where('id_list', $rowDetail['id_list']);
        if (!empty($rowDetail['id_cat'])) $query->where('id_cat', $rowDetail['id_cat']);
        $query->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])->limit(12);
        $product = $query->get();
        return View::share(['idList' => $rowDetail['id_list'], 'com' => $this->type])->view('product.detail', compact('rowDetail', 'rowDetailPhoto', 'product', 'tags', 'rowNews', 'listProperties', 'rowDetailPhoto1'));
    }

    public function searchProduct(Request $request)
    {
        $keyword = $request->query('keyword');
        $product = ProductModel::select('id', 'namevi', 'nameen', 'descvi', 'descen', 'slugvi', 'slugen', 'photo', 'regular_price', 'sale_price', 'discount')
            ->search($keyword)
            ->where('type', 'san-pham')
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->orderBy('numb', 'desc')
            ->orderBy('id', 'desc')
            ->paginate(12);
        $titleMain = 'Tìm kiếm sản phẩm';
        return View::share(['com' => $this->type])->view('product.product', compact('product', 'titleMain'));
    }

    public function suggestProduct(Request $request)
    {
        $keyword = $request->query('keyword');
        $product = ProductModel::select('id', 'namevi', 'nameen', 'descvi', 'descen', 'slugvi', 'slugen', 'photo', 'regular_price', 'sale_price', 'discount')
            ->search($keyword)
            ->where('type', 'san-pham')
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->orderBy('numb', 'desc')
            ->orderBy('id', 'desc')
            ->paginate(15);

        return view('ajax.itemSearch', ['productAjax' => $product ?? []]);
    }

    protected function  checkListProperties($properties = [])
    {
        foreach ($properties as $k => $v) if (empty($v['data'])) unset($properties[$k]);
        return $properties;
    }

    private function  searchListProperties($idl)
    {
        $querySearch = PropertiesListModel::select('type', 'id', 'namevi', 'slugvi')
            ->where('type', 'san-pham')
            ->whereRaw("FIND_IN_SET(?,id_list)", [$idl])
            ->whereRaw("FIND_IN_SET(?,status)", ['search']);
        return $querySearch->orderBy('numb', 'asc')->get()->map(fn($v) => [$v, $v->getProperties()->get()]);
    }

    private function productItem($array = null, $request = null, $slug = '')
    {
        // Mặc định sắp xếp
        $defaultOrderBy = ['numb' => 'asc', 'id' => 'desc'];
        $propaties = $request->getQueryString() ?? '';
        // Lấy thông tin sản phẩm cần truy vấn

        if (!empty($array)) {
            $query = $array->getItems([
                'id',
                'namevi',
                'nameen',
                'descvi',
                'descen',
                'slugvi',
                'slugen',
                'photo',
                'regular_price',
                'sale_price',
                'discount'
            ])->whereRaw("FIND_IN_SET(?,status)", ['hienthi']);
        } else {
            $query = ProductModel::select('id', 'namevi', 'photo', 'descvi', 'slugvi', 'status', 'numb', 'sale_price', 'regular_price')
                ->where('type', $slug)->whereRaw("FIND_IN_SET(?,status)", ['hienthi']);
        }
        // Nếu có tham số lọc từ query string
        if (!empty($propaties)) {
            parse_str($propaties, $result);
            unset($result['page']);
            $query->where(function ($query) use ($result, &$defaultOrderBy) {
                foreach ($result as $key => $propertyGroup) {
                    $items = explode(',', $propertyGroup);

                    // Điều chỉnh sắp xếp khi đến nhóm thuộc tính cuối cùng
                    if ($key == array_key_last($result)) {
                        $defaultOrderBy = match ($items[0]) {
                            "1" => ['id' => 'asc'],
                            "2" => ['id' => 'desc'],
                            "3" => ['sale_price' => 'desc', 'regular_price' => 'desc'],
                            "4" => ['sale_price' => 'asc', 'regular_price' => 'asc'],
                            default => ['numb' => 'asc', 'id' => 'desc'],
                        };
                    } else {
                        // Thêm điều kiện lọc thuộc tính
                        $query->where(function ($subQuery) use ($items) {
                            foreach ($items as $item) {
                                $subQuery->orWhereRaw('FIND_IN_SET(?, properties)', [$item]);
                            }
                        });
                    }
                }
            });
        }

        // Áp dụng sắp xếp dựa trên thứ tự mặc định hoặc từ bộ lọc
        foreach ($defaultOrderBy as $column => $direction) {
            // Kiểm tra nếu regular_sale > 0 thì ưu tiên sắp xếp theo regular_sale
            if ($column === 'sale_price') {
                $query->orderByRaw('CASE WHEN sale_price > 0 THEN sale_price ELSE regular_price END ' . $direction);
            } else {
                $query->orderBy($column, $direction);
            }
        }

        $product = $query->paginate(12);
        return $product;
    }
}

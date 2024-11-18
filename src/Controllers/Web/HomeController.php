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

use Carbon\Carbon;
use Illuminate\Http\Request;
use NINA\Controllers\Controller;
use NINA\Models\PhotoModel;
use NINA\Models\NewsModel;
use NINA\Models\ProductModel;
use NINA\Models\ProductListModel;
use NINA\Models\SettingModel;
use NINA\Models\StaticModel;
use NINA\Models\ProductCatModel;
use NINA\Models\NewslettersModel;
use NINA\Models\TagsModel;
use NINA\Core\Support\Facades\View;
use NINA\Core\Support\Facades\Func;


class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Photo
        $Photo = PhotoModel::select('namevi', 'photo', 'link', 'type')
            ->whereIn('type', ['slide', 'qc','doi-tac','img-tc'])
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->orderBy('numb', 'asc')
            ->orderBy('id', 'desc')
            ->get();

        $slider = $Photo->where('type', 'slide');
        $doitac = $Photo->where('type', 'doi-tac');
        $bannerQC = $Photo->where('type', 'qc')->first();
        $imgTC = $Photo->where('type', 'img-tc')->first();

        // New
        $News = NewsModel::select('namevi', 'nameen', 'photo', 'icon', 'descvi', 'descen', 'contentvi', 'contenten', 'slugvi', 'type', 'status', 'id')
            ->where(function ($query) {
                $query->whereIn('type', ['tieu-chi', 'tin-tuc', 'cam-nhan', 'dich-vu'])
                    ->whereRaw("FIND_IN_SET('hienthi', status)");
            })
            ->orWhere(function ($query) {
                $query->whereIn('type', ['tin-tuc', 'cam-nhan',])
                    ->whereRaw("FIND_IN_SET('hienthi', status)")
                    ->whereRaw("FIND_IN_SET('noibat', status)");
            })
            ->orderByDesc('numb')
            ->orderBy('id')
            ->get();


        $tieuchi = $News->where('type', 'tieu-chi')->values();
        $tintuc = $News->where('type', 'tin-tuc');
        $dichvu = $News->where('type', 'dich-vu');

        // static
        $Static = StaticModel::select('namevi', 'nameen', 'photo','photo1', 'descvi', 'photo1', 'descen', 'contentvi', 'contenten', 'type', 'status', 'id')
            ->whereIn('type', ['gioi-thieu','tieu-chi-cua-thit-bo'])
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])->get();

        $gioithieu = $Static->where('type', 'gioi-thieu')->first();

        $listProductNB = ProductListModel::select('namevi', 'photo', 'id', 'slugvi')
            ->where('type', 'san-pham')
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->whereRaw("FIND_IN_SET(?,status)", ['noibat'])
            ->orderBy('numb', 'asc')
            ->orderBy('id', 'desc')
            ->get();

        $listProductHot = ProductListModel::select('namevi', 'photo', 'id', 'slugvi')
            ->with(['getCategoryCats' => function ($query) {
                $query->select('id_list', 'namevi', 'slugvi', 'id')
                    ->whereRaw("FIND_IN_SET(?,status)", ['noibat']);
            }])
            ->where('type', 'san-pham')
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->whereRaw("FIND_IN_SET(?,status)", ['trangchu'])
            ->orderBy('numb', 'asc')
            ->get();

        /* SEO */
        $titleMain = SettingModel::pluck('namevi')->first();
        $this->seoPage($titleMain);
        return View::share('com', 'trang-chu')->view('home.index', compact('slider', 'listProductNB', 'tieuchi','tintuc', 'gioithieu', 'bannerQC','listProductHot','dichvu','doitac','imgTC'));
    }

    public function ajaxProduct(Request $request)
    {
        $idList = $request->get('idList') ?? 0;
        $idCat = $request->get('idCat') ?? 0;
        $eShow = $request->get('eShow') ?? '';
        $paginate = $request->get('paginate') ?? 8;
        $query = ProductModel::select('namevi', 'photo', 'descvi', 'slugvi', 'regular_price', 'sale_price', 'discount', 'id')
        ->where('type', 'san-pham')
        ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
        ->whereRaw("FIND_IN_SET(?,status)", ['noibat']);
        if (!empty($idList))  $query->where('id_list', $idList);
        if (!empty($idCat))  $query->where('id_cat', $idCat);
        $productAjax = $query->orderBy('id', 'desc')->paginate($paginate);

        return view('ajax.homeProduct', ['productAjax' => $productAjax, 'idList' => $idList, 'idCat' => $idCat, 'eShow' => $eShow]);
    }

    public function letter(Request $request)
    {
        if (!empty($request->csrf_token)) {
            $responseCaptcha = $request->input('recaptcha_response_newsletter') ?? '';
            $resultCaptcha = Func::checkRecaptcha($responseCaptcha);
            $scoreCaptcha = (!empty($resultCaptcha['score'])) ? $resultCaptcha['score'] : 0;
            $actionCaptcha = (!empty($resultCaptcha['action'])) ? $resultCaptcha['action'] : '';
            $testCaptcha = (!empty($resultCaptcha['test'])) ? $resultCaptcha['test'] : false;
            $data = (!empty($request->dataNewsletter)) ? $request->dataNewsletter : null;

            if (($scoreCaptcha >= 0.5 && $actionCaptcha == 'newsletter') || config('app.recaptcha.active') == false) {
                foreach ($data as $column => $value) {
                    $data[$column] = $value ?? '';
                }

                $data['date_created'] = Carbon::now()->timestamp;
                $data['confirm_status'] = 1;
                $data['type'] = 'dang-ky-nhan-tin';
                $data['subject'] = "Đăng ký nhận tin";
                if (NewslettersModel::create($data)) {
                    transfer('Đăng ký nhận tin thành công !', 1, PeceeRequest()->getHeader('http_referer'));
                } else {
                    transfer('Đăng ký nhận tin thất bại !', 0, PeceeRequest()->getHeader('http_referer'));
                }
            } else {
                transfer('Đăng ký nhận tin thất bại !', 0, PeceeRequest()->getHeader('http_referer'));
            }
        }
    }
}

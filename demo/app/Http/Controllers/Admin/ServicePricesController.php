<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\ServicePricesRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServicePrices;
use NumberFormatter;


class ServicePricesController extends Controller
{   
    public function index(ServicePrices $sPrices){
        $listPrice = $sPrices -> get_orderBy_ASC();
        return view('admin_view.pages_view.service_prices_view.list_servicePrices', compact('listPrice'));
    }

    public function view_create_sPrice(Request $req){
        return view('admin_view.pages_view.service_prices_view.create_servicePrices');
    }

    public function create_sPrice(ServicePricesRequest $req, ServicePrices $sPrices){
        // dd($req->all());
        $workingTime = '';
        if($req->begin){
            $validatedData = $req->validate([
                'begin' => 'required',
                'end' => [
                    'required',
                    function($attribute, $value, $fail) use ($req) {
                        if($value <= $req->begin) {
                            $fail('Ngày Hoàn Thành > Ngày Dự Tính!');
                        }
                    }
                ]
            ], [
                'begin.required' => 'Trường Không Được Để Trống!',
                'end.required' => 'Trường Không Được Để Trống!',
            ]);
            $workingTime = $req->begin.'-' .$req->end .' Ngày Làm Việc';
        }else{
            $workingTime = $req->end.' Ngày Làm Việc';
        }
        setlocale(LC_MONETARY, 'vi_VN');
        $price = number_format(floatval($req->price), 0, ',', '.') . ' VNĐ';
        $req->merge(['price' => $price]);
        $req->merge(['workingTime' => $workingTime]);
        
        $create = $sPrices -> creates($req);

        if ($create) {
            return redirect() -> route('list_sPrice')->with('success','Thêm Mới Thành Công!');
        }else{
            return redirect() -> route('view_create_sPrice')->with('err','Thêm Mới Thất Bại!');
        }
    }

    public function view_update_sPrice(Request $request, ServicePrices $sPrices, $slug) {
        $obj = $sPrices->get_link($slug);
        if (!$obj) {
            return view('admin_view.error.404');
        }

        $matches = [];
        if (preg_match_all('/\d+/', $obj->workingTime, $matches) !== false) {
            if(count($matches[0]) >= 2) {
                $begin = isset($matches[0][0]) ? $matches[0][0] : null;
                $end = isset($matches[0][1]) ? $matches[0][1] : null;
            }else{
                $begin = null;
                $end = isset($matches[0][0]) ? $matches[0][0] : null;
            }
            
        } else {
            $begin = null;
            $end = null;
        }

        $price = intval(preg_replace("/[^0-9]/", "", $obj->price));

        return view('admin_view.pages_view.service_prices_view.update_servicePrices', compact('obj', 'begin', 'end', 'price'));
    }

    public function update_sPrice(Request $request, ServicePrices $sPrices, $slug){
        $validatedData = $request->validate([
            'nameService' => [
                'required',
                function ($attribute, $value, $fail) use ($sPrices, $slug) {
                    $exists = ServicePrices::where('linkText', '!=', $slug)
                                        ->where('nameService', $value)
                                        ->exists();
                    if ($exists) {
                        $fail('Trường đã tồn tại.');
                    }
                },
            ],
            'end' => 'required',
            'price' => 'required',
        ], [
            'nameService.required' => 'Trường Không Được Để Trống!',
            'end.required' => 'Trường Không Được Để Trống!',
            'price.required' => 'Trường Không Được Để Trống!',
        ]);
        $workingTime = '';
        if($request->begin){
            $validatedData = $request->validate([
                'begin' => 'required',
                'end' => [
                    'required',
                    function($attribute, $value, $fail) use ($request) {
                        if($value <= $request->begin) {
                            $fail('Ngày Hoàn Thành > Ngày Dự Tính!');
                        }
                    }
                ]
            ], [
                'begin.required' => 'Trường Không Được Để Trống!',
                'end.required' => 'Trường Không Được Để Trống!',
            ]);

            $workingTime = $request->begin.'-' .$request->end .' Ngày Làm Việc';
        }else{
            $workingTime = $request->end.' Ngày Làm Việc';
        }
        setlocale(LC_MONETARY, 'vi_VN');
        $price = number_format(floatval($request->price), 0, ',', '.') . ' VNĐ';
        $request->merge(['price' => $price]);
        $request->merge(['workingTime' => $workingTime]);

        if ($sPrices->get_link($slug)) {
            $update = $sPrices -> update_prices($request, $slug);
            if ($update > 0) {
                return redirect() -> route('list_sPrice')->with('success','Chỉnh Sủa Thành Công!');
            }else{
                return redirect() -> route('list_sPrice')->with('err','Chỉnh Sủa Thất Bại!');
            }
        }
        return view('admin_view.error.404');
    }

    public function delete_sPrice(ServicePrices $sPrices, $slug){
        $obj = $sPrices->get_link($slug);
        if (!$obj) {
            return view('admin_view.error.404');
        }

        $delete = $sPrices->delete_prices($slug);
        if ($delete > 0) {
            return redirect() -> route('list_sPrice')->with('success','Xóa Thành Công!');
        }else{
            return redirect() -> route('list_sPrice')->with('err','Xóa Thất Bại!');
        }
    }

    public function view_detail_sPrice(Request $request, ServicePrices $sPrices, $slug) {
        $obj = $sPrices->get_link($slug);
        if (!$obj) {
            return view('admin_view.error.404');
        }

        $matches = [];
        if (preg_match_all('/\d+/', $obj->workingTime, $matches) !== false) {
            if(count($matches[0]) >= 2) {
                $begin = isset($matches[0][0]) ? $matches[0][0] : null;
                $end = isset($matches[0][1]) ? $matches[0][1] : null;
            }else{
                $begin = null;
                $end = isset($matches[0][0]) ? $matches[0][0] : null;
            }
            
        } else {
            $begin = null;
            $end = null;
        }

        $price = intval(preg_replace("/[^0-9]/", "", $obj->price));

        return view('admin_view.pages_view.service_prices_view.view_detail', compact('obj', 'begin', 'end', 'price'));
    }
}
<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\LegalAdviceRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LegalAdvice;
use App\Models\PostsAdvice;


class LegalAdviceController extends Controller
{
    public function index(LegalAdvice $lAdvice){
        $list = $lAdvice -> get_orderBy_ASC();
        return view('admin_view.pages_view.legal_Advice_view.list_legalAdvice', compact('list'));
    }

    public function view_create_lAdvice(Request $req){
        return view('admin_view.pages_view.legal_Advice_view.create_legalAdvice');
    }

    public function create_lAdvice(LegalAdviceRequest $req, LegalAdvice $lAdvice) {
        // dd($req->all());
        $create = $lAdvice -> creates($req);

        if ($create) {
            return redirect() -> route('list_lAdvice')->with('success','Tạo Danh Mục Thành Công!');
        }else{
            return redirect() -> route('view_create_lAdvice')->with('err','Tạo Danh Mục Thất Bại!');
        }
    }

    public function view_update_lAdvice(Request $request, LegalAdvice $lAdvice, $slug){
        $obj = $lAdvice->get_link($slug);
        if (!$obj) {
            return view('admin_view.error.404');
        }

        return view('admin_view.pages_view.legal_Advice_view.update_legalAdvice', compact('obj'));
    }

    public function update_lAdvice(Request $request, LegalAdvice $lAdvice, $slug){
        $validatedData = $request->validate([
            'name' => [
                'required',
                function ($attribute, $value, $fail) use ($lAdvice, $slug) {
                    $exists = LegalAdvice::where('linkText', '!=', $slug)
                                        ->where('name', $value)
                                        ->exists();
                    if ($exists) {
                        $fail('Trường đã tồn tại.');
                    }
                },
            ],
        ], [
            'name.required' => 'Trường Không Được Để Trống!',
        ]);

        if ($lAdvice->get_link($slug)) {
            $update = $lAdvice -> update_advice($request, $slug);
            if ($update > 0) {
                return redirect() -> route('list_lAdvice')->with('success','Chỉnh Sủa Thành Công!');
            }else{
                return redirect() -> route('list_lAdvice')->with('err','Chỉnh Sủa Thất Bại!');
            }
        }
        return view('admin_view.error.404');
    }

    public function delete_lAdvice(LegalAdvice $lAdvice,PostsAdvice $postsAdvice, $slug){
        $obj = $lAdvice->get_link($slug);
        if (!$obj) {
            return view('admin_view.error.404');
        }

        $delete = $postsAdvice->delete_pAdvice_Where($obj->id);
        if ($delete >= 0) {
            $delete_category = $lAdvice->delete_advice($slug);
            if ($delete_category > 0) {
                return redirect() -> route('list_lAdvice')->with('success','Xóa Thành Công!');
            }else{
                return redirect() -> route('list_lAdvice')->with('err','Xóa Thất Bại, Vướng Khóa Ngoại!');
        }
        }else{
            return redirect() -> route('list_lAdvice')->with('err','Xóa Thất Bại, Vướng Khóa Ngoại!');
        }
    }
}
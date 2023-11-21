<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminProceRequest;
use App\Models\AdminProce;
use App\Models\PostsProce;

class AdminProceController extends Controller
{
     public function index(AdminProce $lProce){
        $list = $lProce -> get_orderBy_ASC();
        return view('admin_view.pages_view.admin_proce_view.list_admin_proce', compact('list'));
    }

    public function view_create_Proce(Request $req){
        return view('admin_view.pages_view.admin_proce_view.create_admin_proce');
    }

    public function create_Proce(AdminProceRequest $req, AdminProce $lProce) {
        // dd($req->all());
        $create = $lProce -> creates($req);

        if ($create) {
            return redirect() -> route('list_Proce')->with('success','Tạo Danh Mục Thành Công!');
        }else{
            return redirect() -> route('view_create_Proce')->with('err','Tạo Danh Mục Thất Bại!');
        }
    }

    public function view_update_Proce(Request $request, AdminProce $lProce, $slug){
        $obj = $lProce->get_link($slug);
        if (!$obj) {
            return view('admin_view.error.404');
        }

        return view('admin_view.pages_view.admin_proce_view.update_admin_proce', compact('obj'));
    }

    public function update_Proce(Request $request, AdminProce $lProce, $slug){
        $validatedData = $request->validate([
            'name' => [
                'required',
                function ($attribute, $value, $fail) use ($lProce, $slug) {
                    $exists = AdminProce::where('linkText', '!=', $slug)
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

        if ($lProce->get_link($slug)) {
            $update = $lProce -> update_advice($request, $slug);
            if ($update > 0) {
                return redirect() -> route('list_Proce')->with('success','Chỉnh Sủa Thành Công!');
            }else{
                return redirect() -> route('list_Proce')->with('err','Chỉnh Sủa Thất Bại!');
            }
        }
        return view('admin_view.error.404');
    }

     public function delete_Proce(AdminProce $lProce,PostsProce $pProce, $slug){
        $obj = $lProce->get_link($slug);
        if (!$obj) {
            return view('admin_view.error.404');
        }

        $delete = $pProce->delete_pProce_Where($obj->id);
        if ($delete >= 0) {
            $delete_category = $lProce->delete_advice($slug);
            if ($delete_category > 0) {
                return redirect() -> route('list_Proce')->with('success','Xóa Thành Công!');
            }else{
                return redirect() -> route('list_Proce')->with('err','Xóa Thất Bại, Vướng Khóa Ngoại!');
        }
        }else{
            return redirect() -> route('list_Proce')->with('err','Xóa Thất Bại, Vướng Khóa Ngoại!');
        }
    }
}
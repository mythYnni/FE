<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Support;

class HomeAdminController extends Controller
{
    public function index(){
        return view('admin_view.pages_view.adminHome');
    }

    public function list_support_view(Support $support){
        $list = $support -> get_orderBy_DESC();
        // dd($list);
        return view('admin_view.pages_view.support_view.list_support_view', compact('list'));
    }

    public function delete_support(Support $support, $slug){
        $obj = $support->get_link($slug);
        if (!$obj) {
            return view('admin_view.error.404');
        }

        $delete = $support->delete_support($slug);
        if ($delete > 0) {
            return redirect() -> route('list_support_view')->with('success','Xóa Thành Công!');
        }else{
            return redirect() -> route('list_support_view')->with('err','Xóa Thất Bại!');
        }
    }

    public function view_update_support(Request $req, Support $support, $slug){
        $obj = $support -> get_link($slug);
        if(!$obj){ 
            return view('admin_view.error.404');
        }
        return view('admin_view.pages_view.support_view.update_support_view', compact('obj'));
    }

    public function update(Request $request, Support $support, $slug){
        if ($support->get_link($slug)) {
            $update = $support -> update_support($request, $slug);
            if ($update > 0) {
                return redirect() -> route('list_support_view')->with('success','Cập Nhật Thành Công!');
            }else{
                return redirect() -> route('list_support_view')->with('err','Cập Nhật Thất Bại!');
            }
        }
        return view('admin_view.error.404');
    }

}
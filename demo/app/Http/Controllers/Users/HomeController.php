<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminProce;
use App\Models\LegalAdvice;
use App\Models\PostsProce;
use App\Models\PostsAdvice;
use App\Models\ServicePrices;
use App\Http\Requests\SupportRequest;
use App\Models\Support;

class HomeController extends Controller
{
    public function index(AdminProce $aProce, LegalAdvice $lAdvice, PostsAdvice $pAdvice, ServicePrices $sPrice){
        $category_aProce = $aProce->get_orderBy_ASC_Where();
        $category_lAdvice = $lAdvice->get_orderBy_ASC_Where();
        $list_lAdvice = $pAdvice->get_orderBy_DESC_Status_category_count();
        $list_sPrice = $sPrice->get_orderBy_ASC();
        return view('user_view.pages_view.S&DHome', compact('category_aProce', 'category_lAdvice','list_lAdvice', 'list_sPrice'));
    }

    public function about(AdminProce $aProce, LegalAdvice $lAdvice, PostsProce $pProce, ServicePrices $sPrice){
        $category_aProce = $aProce->get_orderBy_ASC_Where();
        $category_lAdvice = $lAdvice->get_orderBy_ASC_Where();
        $list_pProce = $pProce->get_orderBy_DESC_Status_category_count();
        $list_sPrice = $sPrice->get_orderBy_ASC();
        return view('user_view.pages_view.about', compact('category_aProce', 'category_lAdvice','list_pProce', 'list_sPrice'));
    }

    public function price(ServicePrices $sPrice){
        $obj = $sPrice -> prices();
        return response()->json($obj);
    }

    //
    ///
    ////
    ////// aProce
    ////
    ///
    //

    //Thủ Tục Hành Chính
    public function blog_aProce(AdminProce $aProce, LegalAdvice $lAdvice, PostsProce $pProce){
        $category_aProce = $aProce->get_orderBy_ASC_Where();
        $category_lAdvice = $lAdvice->get_orderBy_ASC_Where();
        $list_aProce = $pProce->get_orderBy_DESC_Status();
        return view('user_view.pages_view.blog_aProce', compact('category_aProce', 'category_lAdvice', 'list_aProce'));
    }

    //Xem Bài Viết Thủ Tục Hành Chính theo Danh Mục
    public function category_blog_aProce(AdminProce $aProce, LegalAdvice $lAdvice, PostsProce $pProce, $slug){
        $category_aProce = $aProce->get_orderBy_ASC_Where();
        $category_lAdvice = $lAdvice->get_orderBy_ASC_Where();
        $list_aProce = $pProce->get_orderBy_DESC_Status_category($slug);
        $list_qc= $pProce->get_qc();
        return view('user_view.pages_view.blog_aProce', compact('category_aProce', 'category_lAdvice', 'list_aProce', 'list_qc'));
    }

    public function detail_blog(PostsProce $pProce, $slug){
        $obj = $pProce -> get_link($slug);
        return response()->json($obj);
    }

    //
    ///
    ////
    ////// lAdvice
    ////
    ///
    //

    //Tư Vấn Pháp Luật
    public function blog_lAdvice(AdminProce $aProce, LegalAdvice $lAdvice, PostsAdvice $pAdvice){
        $category_aProce = $aProce->get_orderBy_ASC_Where();
        $category_lAdvice = $lAdvice->get_orderBy_ASC_Where();
        $list_lAdvice = $pAdvice->get_orderBy_DESC_Status();
        $list_qc= $pAdvice->get_qc();
        return view('user_view.pages_view.blog_lAdvice', compact('category_aProce', 'category_lAdvice', 'list_lAdvice', 'list_qc'));
    }

    //Xem Bài Viết Tư Vấn Pháp Luật theo Danh Mục
    public function category_blog_lAdvice(AdminProce $aProce, LegalAdvice $lAdvice, PostsAdvice $pAdvice, $slug){
        $category_aProce = $aProce->get_orderBy_ASC_Where();
        $category_lAdvice = $lAdvice->get_orderBy_ASC_Where();
        $list_lAdvice = $pAdvice->get_orderBy_DESC_Status_category($slug);
        return view('user_view.pages_view.blog_lAdvice', compact('category_aProce', 'category_lAdvice', 'list_lAdvice'));
    }

    public function detail_blog_lAdvice(PostsAdvice $pAdvice, $slug){
        $obj = $pAdvice -> get_link($slug);
        return response()->json($obj);
    }

    //
    ///
    ////
    //////
    ////
    ///
    //

    public function contact(AdminProce $aProce, LegalAdvice $lAdvice, PostsAdvice $pAdvice){
        $category_aProce = $aProce->get_orderBy_ASC_Where();
        $category_lAdvice = $lAdvice->get_orderBy_ASC_Where();
        $list_lAdvice = $pAdvice->get_orderBy_DESC_Status_category_count();
        return view('user_view.pages_view.contact', compact('category_aProce', 'category_lAdvice', 'list_lAdvice'));
    }

    //
    ///
    ////
    //////
    ////
    ///
    //

    public function contact_support(SupportRequest $req, Support $support){
        // dd($req -> all());
        $characters = 'abcxyzwghqpnmtoiu0123456789';
        $randomString = substr(str_shuffle($characters), 0, 10);
        $req->merge(['linkText' => $req->phone."-".$randomString."-laws"]);
        $create = $support -> creates($req);

        if ($create) {
            return redirect() -> route('S&D_Contact')->with('success','Thành Công Rồi Bạn Ơi!');
        }else{
            return redirect() -> route('S&D_Contact')->with('err','Lỗi Rồi Bạn Ơi!');
        }
    }
}
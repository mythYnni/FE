<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PostsAdviceRequest;
use App\Models\PostsAdvice;
use App\Models\LegalAdvice;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PostsAdviceController extends Controller
{
    public function index(PostsAdvice $postsAdvice, $slug, User $user){

        if(!$slug){ 
            return view('admin_view.error.404');
        }

        $account = $user -> get_link($slug);

        if(!$account){ 
            return view('admin_view.error.404');
        }

        if($account->decentralization == 1){
            $list = $postsAdvice -> get_orderBy_DESC();
        }else{
            $list = $postsAdvice -> get_orderBy_Where_DESC($account->id);
        }
        return view('admin_view.pages_view.legal_Advice_view.posts_advice_view.list_postsAdvice', compact('list'));
    }   

    public function detail_pAdvice(PostsAdvice $postsAdvice, $slug){
        $postsAdvice = $postsAdvice -> get_link($slug);
        return response()->json($postsAdvice);
    }

    public function view_create_pAdvice(Request $req, LegalAdvice $lAdvice){
        $listAdvice = $lAdvice -> get_orderBy_ASC_Where();
        return view('admin_view.pages_view.legal_Advice_view.posts_advice_view.create_postsAdvice', compact('listAdvice'));
    }

    public function create_pAdvice(PostsAdviceRequest $req, LegalAdvice $lAdvice, User $user, PostsAdvice $postsAdvice){
        $file = '';
        if ($req->file('images')) {
            $response = cloudinary()->upload($req->file('images')->getRealPath())->getSecurePath();
            $file = $response;
        }
        $category = $lAdvice->get_link($req->category_link);
        $obj_user =  $user->get_link($req->user_link);
        if(!$obj_user){ 
            return view('admin_view.error.404');
        }
        $req->merge(['user_id' => $obj_user->id]);
        $req->merge(['category_id' => $category->id]);
        $req->merge(['nameCategory' => $category->name]);
        $req->merge(['image' => $file]);

        $create = $postsAdvice -> creates($req);

        if ($create) {
            return redirect() -> route('list_pAdvice', ['slug' => Auth::user()->linkText])->with('success','Tạo Bài Viết Thành Công!');
        }else{
            return redirect() -> route('view_create_pAdvice')->with('err','Tạo Bài Viết Thất Bại!');
        }
    }

    public function view_update_pAdvice(Request $req, LegalAdvice $lAdvice, PostsAdvice $postsAdvice, $slug){
        $listAdvice = $lAdvice -> get_orderBy_ASC_Where();
        $postsAdvice = $postsAdvice -> get_join($slug);
        if(!$postsAdvice){ 
            return view('admin_view.error.404');
        }
        return view('admin_view.pages_view.legal_Advice_view.posts_advice_view.update_postsAdvice', compact('listAdvice', 'postsAdvice'));
    }

    public function update_pAdvice(Request $req,PostsAdvice $postsAdvice, $slug, LegalAdvice $lAdvice, User $user){
        $validatedData = $req->validate([
            'title' => [
                'required',
                function ($attribute, $value, $fail) use ($postsAdvice, $slug) {
                    $exists = PostsAdvice::where('linkText', '!=', $slug)
                                        ->where('title', $value)
                                        ->exists();
                    if ($exists) {
                        $fail('Trường đã tồn tại.');
                    }
                },
            ],
            'content' => 'required'
        ], [
            'title.required' => 'Trường Không Được Để Trống!',
            'content.required' => 'Nội Dung Không Được Để Trống!',
        ]);
        
        $file = '';
        if ($req->file('images')) {
            $response = cloudinary()->upload($req->file('images')->getRealPath())->getSecurePath();
            $file = $response;
        }
        
        $file = $req -> img;
        $category = $lAdvice->get_link($req->category_link);
        $obj_user =  $user->get_link($req->user_link);

        if(!$obj_user){ 
            return view('admin_view.error.404');
        }
        
        $req->merge(['user_id' => $obj_user->id]);
        $req->merge(['category_id' => $category->id]);
        $req->merge(['nameCategory' => $category->name]);
        $req->merge(['image' => $file]);

        $update = $postsAdvice -> update_pAdvice($req, $slug);

        if ($update > 0) {
            return redirect() -> route('list_pAdvice', ['slug' => Auth::user()->linkText])->with('success','Sửa Bài Viết Thành Công!');
        }else{
            return redirect() -> route('list_pAdvice', ['slug' => Auth::user()->linkText])->with('err','Sửa Bài Viết Thất Bại!');
        }
    }

    public function delete_pAdvice(PostsAdvice $postsAdvice, $slug){
        $obj = $postsAdvice->get_link($slug);
        if (!$obj) {
            return view('admin_view.error.404');
        }

        $delete = $postsAdvice->delete_pAdvice($slug);
        if ($delete > 0) {
            return redirect() -> route('list_pAdvice', ['slug' => Auth::user()->linkText])->with('success','Xóa Thành Công!');
        }else{
            return redirect() -> route('list_pAdvice', ['slug' => Auth::user()->linkText])->with('err','Xóa Thất Bại!');
        }
    }
}
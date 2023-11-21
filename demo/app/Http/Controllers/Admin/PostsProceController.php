<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PostsProceRequest;
use App\Models\PostsProce;
use App\Models\AdminProce;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PostsProceController extends Controller
{
    public function index(PostsProce $pProce, $slug, User $user){

        if(!$slug){ 
            return view('admin_view.error.404');
        }

        $account = $user -> get_link($slug);

        if(!$account){ 
            return view('admin_view.error.404');
        }

        if($account->decentralization == 1){
            $list = $pProce -> get_orderBy_DESC();
        }else{
            $list = $pProce -> get_orderBy_Where_DESC($account->id);
        }
        return view('admin_view.pages_view.admin_proce_view.posts_proce_view.list_pProce', compact('list'));
    }   

    public function detail_pProce(PostsProce $pProce, $slug){
        $pProce = $pProce -> get_link($slug);
        return response()->json($pProce);
    }

    public function view_create_pProce(Request $req, AdminProce $aProce){
        $listAdvice = $aProce -> get_orderBy_ASC_Where();
        return view('admin_view.pages_view.admin_proce_view.posts_proce_view.craete_pProce', compact('listAdvice'));
    }

    public function create_pProce(PostsProceRequest $req, AdminProce $aProce, User $user, PostsProce $pProce){
        $file = '';
        if ($req->file('images')) {
            $response = cloudinary()->upload($req->file('images')->getRealPath())->getSecurePath();
            $file = $response;
        }
        $category = $aProce->get_link($req->category_link);
        $obj_user =  $user->get_link($req->user_link);
        if(!$obj_user){ 
            return view('admin_view.error.404');
        }
        $req->merge(['user_id' => $obj_user->id]);
        $req->merge(['category_id' => $category->id]);
        $req->merge(['nameCategory' => $category->name]);
        $req->merge(['image' => $file]);

        $create = $pProce -> creates($req);

        if ($create) {
            return redirect() -> route('list_pProce', ['slug' => Auth::user()->linkText])->with('success','Tạo Bài Viết Thành Công!');
        }else{
            return redirect() -> route('view_create_pProce')->with('err','Tạo Bài Viết Thất Bại!');
        }
    }

    public function view_update_pProce(Request $req, AdminProce $aProce, PostsProce $pProce, $slug){
        $listAdvice = $aProce -> get_orderBy_ASC_Where();
        $postsAdvice = $pProce -> get_join($slug);
        if(!$postsAdvice){ 
            return view('admin_view.error.404');
        }
        return view('admin_view.pages_view.admin_proce_view.posts_proce_view.update_pProce', compact('listAdvice', 'postsAdvice'));
    }

    public function update_pProce(Request $req,PostsProce $pProce, $slug, AdminProce $aProce, User $user){
        // dd($req->all());
        $validatedData = $req->validate([
            'title' => [
                'required',
                function ($attribute, $value, $fail) use ($pProce, $slug) {
                    $exists = PostsProce::where('linkText', '!=', $slug)
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
        $category = $aProce->get_link($req->category_link);
        $obj_user =  $user->get_link($req->user_link);

        if(!$obj_user){ 
            return view('admin_view.error.404');
        }
        
        $req->merge(['user_id' => $obj_user->id]);
        $req->merge(['category_id' => $category->id]);
        $req->merge(['nameCategory' => $category->name]);
        $req->merge(['image' => $file]);

        $update = $pProce -> update_pProce($req, $slug);

        if ($update > 0) {
            return redirect() -> route('list_pProce', ['slug' => Auth::user()->linkText])->with('success','Sửa Bài Viết Thành Công!');
        }else{
            return redirect() -> route('list_pProce', ['slug' => Auth::user()->linkText])->with('err','Sửa Bài Viết Thất Bại!');
        }
    }

    public function delete_pProce(PostsProce $pProce, $slug){
        $obj = $pProce->get_link($slug);
        if (!$obj) {
            return view('admin_view.error.404');
        }

        $delete = $pProce->delete_pProce($slug);
        if ($delete > 0) {
            return redirect() -> route('list_pProce', ['slug' => Auth::user()->linkText])->with('success','Xóa Thành Công!');
        }else{
            return redirect() -> route('list_pProce', ['slug' => Auth::user()->linkText])->with('err','Xóa Thất Bại!');
        }
    }
}
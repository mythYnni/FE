<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AccountsRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\PostsProce;
use App\Models\PostsAdvice;

class UserController extends Controller
{
     public function index(User $accounts){
        if(Auth::user()->decentralization != '1'){
            return view('admin_view.error.404');
        }

        $listAc = $accounts -> get_orderBy_ASC();
        return view('admin_view.pages_view.account_view.list_account', compact('listAc'));
    }

    public function detail_account(User $accounts, $slug){
        $account = $accounts -> get_link($slug);
        return response()->json($account);
    }

    public function view_create_account(){
        if(Auth::user()->decentralization != '1'){
            return view('admin_view.error.404');
        }
        return view('admin_view.pages_view.account_view.create_account');
    }
    

    public function create_account(AccountsRequest $req, User $accounts,){
        // dd($req -> all());
        if ($req->file('imageAcount')) {
            $response = cloudinary()->upload($req->file('imageAcount')->getRealPath())->getSecurePath();
        }
        $req->merge(['file' => $response]);
        $req->merge(['password' => Hash::make($req->password)]);
        $characters = 'abcxyzwghqpnmtoiu0123456789';
        $randomString = substr(str_shuffle($characters), 0, 10);
        $req->merge(['linkText' => $req -> linkText."-".$randomString."-laws"]);
     
        $create = $accounts -> creates($req);

        if ($create) {
            return redirect() -> route('list_account')->with('success','Tạo Tài Khoản Thành Công!');
        }else{
            return redirect() -> route('view_create_account')->with('err','Tạo Tài Khoản Thất Bại!');
        }

    }

    public function view_update_accoun(REQUEST $request,User $accounts, $slug){
        if(Auth::user()->decentralization != '1'){
            return view('admin_view.error.404');
        }
        $account = $accounts -> get_link($slug);
        if($account){
            return view('admin_view.pages_view.account_view.update_account', compact('account'));
        }else{
            return view('admin_view.error.404');
        }
    }

    public function update_account(REQUEST $req,User $accounts, $slug){
        $obj = $accounts -> get_link($slug);

        if($req->updatePass || $req->checkPass){
            $validatedData = $req->validate([
                'updatePass' => 'required',
                'checkPass' => 'required|same:updatePass',
            ], [
                'updatePass.required' => 'Trường Không Được Để Trống!',
                'updatePass.confirmed' => 'Xác Nhận Mật Khẩu Không Khớp.!',
                'checkPass.required' => 'Trường Không Được Để Trống!',
                'checkPass.same' => 'Mật khẩu kiểm tra và mật khẩu phải khớp.!',
            ]);
            
            if ($obj) {
                $req->merge(['updatePass' => Hash::make($req->updatePass)]);
                $update = $accounts -> update_password($req, $slug);
                if ($update > 0) {
                    return redirect()->route('list_account')->with('success', 'Cập Nhật Tài Khoản Thành Công!');
                } else {
                    return redirect()->route('list_account')->with('err', 'Cập Nhật Tài Khoản Thất Bại!');
                }
            } else {
                return view('admin_view.error.404');
            }
        } else {
            if ($obj) {
                $update = $update = $accounts -> update_password($req, $slug);
                if ($update > 0) {
                    return redirect()->route('list_account')->with('success', 'Cập Nhật Tài Khoản Thành Công!');
                } else {
                    return redirect()->route('list_account')->with('err', 'Cập Nhật Tài Khoản Thất Bại!');
                }
            } else {
                return view('admin_view.error.404');
            }
        }
    }

    public function index_profile(User $accounts, $slug){
        $profile = $accounts->get_link($slug);
        
         if ($profile) {
            return view('admin_view.pages_view.profile_view.profile');
        } else {
            return view('admin_view.error.404');
        }
    }

    public function update_profile(User $accounts, $slug, Request $req){
        $validatedData = $req->validate([
            'fullName' => 'required',
            'phone' =>  ['required', 'regex:/^(03|05|07|08|09)+([0-9]{8})\b/',
            function ($attribute, $value, $fail) use ($accounts, $slug) {
                $exists = User::where('linkText', '!=', $slug)
                            ->where('phone', $value)
                            ->exists();
                if ($exists) {
                    $fail('Trường đã tồn tại.');
                }
            },
        ],
            'email' => ['required','email',
                function ($attribute, $value, $fail) use ($accounts, $slug) {
                    $exists = User::where('linkText', '!=', $slug)
                                        ->where('email', $value)
                                        ->exists();
                    if ($exists) {
                        $fail('Trường đã tồn tại.');
                    }
                },
            ],
        ], [
            'fullName.required' => 'Trường Không Được Để Trống!',
            'email.required' => 'Trường Không Được Để Trống!',
            'email.email' => 'Sai Định Dạng!',
            'phone.required' => 'Trường Không Được Để Trống!',
            'phone.regex' => 'Sai Định Dạng!',
        ]);

        $file = '';

        if ($req->file('imageAcount')) {
            $response = cloudinary()->upload($req->file('imageAcount')->getRealPath())->getSecurePath();
            $file = $response;
        }else{
            $file = $req->img;
        }

        $req->merge(['file' => $file]);

        $update = $accounts -> update_profile($req, $slug);
        if ($update > 0) {
            return redirect()->route('index_profile', ['slug' => Auth::user()->linkText])->with('success', 'Cập Nhật Thành Công!');
        } else {
            return redirect()->route('index_profile', ['slug' => Auth::user()->linkText])->with('err', 'Cập Nhật Thất Bại!');
        }
    }

    public function view_password_profile(User $accounts, $slug){
         $profile = $accounts->get_link($slug);
        
         if ($profile) {
            return view('admin_view.pages_view.profile_view.profile_password');
        } else {
            return view('admin_view.error.404');
        }
    }

    public function create_password_profile(Request $req, User $accounts, $slug){
        $validatedData = $req->validate([
            'oldPassword' => 'required',
            'password' => 'required',
            'checkPassword' => 'required|same:password',
        ], [
            'oldPassword.required' => 'Trường Không Được Để Trống!',
            'password.required' => 'Trường Không Được Để Trống!',
            'password.confirmed' => 'Xác Nhận Mật Khẩu Không Khớp.!',
            'checkPassword.required' => 'Trường Không Được Để Trống!',
            'checkPassword.same' => 'Mật khẩu kiểm tra và mật khẩu phải khớp.!',
        ]);

        if (Auth::attempt(['accountName' => Auth::user()-> accountName,'password' => $req -> oldPassword])) {
            $req->merge(['passwords' => Hash::make($req->password)]);
            $create_password = $accounts->create_password($req, Auth::user()->linkText);
            if ($create_password > 0) {
                Auth::logout();
                return redirect() -> route('view_login_admin')->with('success', 'Cập Nhật Thành Công!');;
            } else {
                return redirect()->route('index_profile', ['slug' => Auth::user()->linkText])->with('err', 'Cập Nhật Thất Bại!');
            }
        } else {
            return redirect()->back()->withErrors(['oldPassword' => 'Mật khẩu không đúng']);
        }
    }

    public function detete_account(PostsAdvice $pAdvice, PostsProce $pProce, User $accounts, $slug){
        $obj = $accounts->get_link($slug);
        if (!$obj) {
            return view('admin_view.error.404');
        }

        $delete_pAdvice = $pAdvice->delete_pAdvice_Where_user($obj->id);
        $delete_pProce = $pProce->delete_pProce_Where_user($obj->id);

        if($delete_pProce >=0 && $delete_pAdvice >=0 ){
            $delete = $accounts->detete_account($slug);
            if ($delete > 0) {
                return redirect()->route('list_account', ['slug' => Auth::user()->linkText])->with('success', 'Xóa Thành Công!');
            } else {
                return redirect()->route('list_account', ['slug' => Auth::user()->linkText])->with('err', 'Xóa Thất Bại!');
            }
        }elseif($delete_pProce >=0) {
            $delete = $accounts->detete_account($slug);
            if ($delete > 0) {
                return redirect()->route('list_account', ['slug' => Auth::user()->linkText])->with('success', 'Xóa Thành Công!');
            } else {
                return redirect()->route('list_account', ['slug' => Auth::user()->linkText])->with('err', 'Xóa Thất Bại!');
            }
        } elseif($delete_pAdvice >=0) {
             $delete = $accounts->detete_account($slug);
            if ($delete > 0) {
                return redirect()->route('list_account', ['slug' => Auth::user()->linkText])->with('success', 'Xóa Thành Công!');
            } else {
                return redirect()->route('list_account', ['slug' => Auth::user()->linkText])->with('err', 'Xóa Thất Bại!');
            }
        }
    }
}
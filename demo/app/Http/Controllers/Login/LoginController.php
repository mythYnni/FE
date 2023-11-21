<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function view_login_admin(REQUEST $req,User $accounts){
        return view('login.view_login');
    }
    
    public function login_admin(REQUEST $req, User $accounts){

        $validatedData = $req->validate([
            'accountName' => 'required',
            'password' => 'required',
        ], [
            'accountName.required' => 'Trường Không Được Để Trống!',
            'password.required' => 'Trường Không Được Để Trống!',
        ]);
        // dd($req -> all());
        if (Auth::attempt(['accountName' => $req -> accountName,'password' => $req -> password])){
            return redirect() -> route('S&D_Admin_Home')->with('success', 'Đăng Nhập Thành Công!');
        }else{
            return redirect() -> back() ->with('err', 'Đăng Nhập Thất Bại!');
        };
    }

    public function logout(){
        Auth::logout();
        return redirect() -> route('view_login_admin');
    }
}
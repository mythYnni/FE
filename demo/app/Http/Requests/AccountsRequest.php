<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fullName' => 'required',
            'accountName' => 'required|unique:users',
            'phone' =>  ['required', 'regex:/^(03|05|07|08|09)+([0-9]{8})\b/','unique:users'],
            'email' => 'required|email|unique:users',
            'imageAcount' =>'required',
            'password' => 'required',
            'checkPassword' => 'required|same:password',
            'imageAcount' => 'required',
        ];  
    }

    public function messages(){
        return [
            'fullName.required' => 'Trường Không Được Để Trống!',
            'accountName.unique' => 'Trường Đã Tồn Tại!',
            'accountName.required' => 'Trường Không Được Để Trống!',
            'email.unique' => 'Trường Đã Tồn Tại!',
            'email.required' => 'Trường Không Được Để Trống!',
            'email.email' => 'Sai Định Dạng!',
            'phone.unique' => 'Trường Đã Tồn Tại!',
            'phone.required' => 'Trường Không Được Để Trống!',
            'phone.regex' => 'Sai Định Dạng!',
            'imageAcount.required' => 'Trường Không Được Để Trống!',
            'password.required' => 'Trường Không Được Để Trống!',
            'password.confirmed' => 'Xác Nhận Mật Khẩu Không Khớp.!',
            'checkPassword.required' => 'Trường Không Được Để Trống!',
            'checkPassword.same' => 'Mật khẩu kiểm tra và mật khẩu phải khớp.!',
            'imageAcount.required' => 'Trường Không Được Để Trống!',
        ];
    }
}
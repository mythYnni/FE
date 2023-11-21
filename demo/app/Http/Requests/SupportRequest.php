<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupportRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
         return [
            'name' => 'required',
            'phone' =>  ['required', 'regex:/^(03|05|07|08|09)+([0-9]{8})\b/'],
            'email' => 'required|email',
        ];  
    }

     public function messages(){
        return [
            'name.required' => 'Trường Không Được Để Trống!',
            'email.required' => 'Trường Không Được Để Trống!',
            'email.email' => 'Sai Định Dạng!',
            'phone.required' => 'Trường Không Được Để Trống!',
            'phone.regex' => 'Sai Định Dạng!',
        ];
    }
}

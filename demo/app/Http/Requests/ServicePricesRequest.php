<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServicePricesRequest extends FormRequest
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
            'nameService' => 'required|unique:serviceprices',
            'end' => 'required',
            'price' => 'required',
            'content' => 'required'
        ];
    }

     public function messages(){
        return [
            'nameService.required' => 'Trường Không Được Để Trống!',
            'nameService.unique' => 'Trường Đã Tồn Tại!',
            'end.required' => 'Trường Không Được Để Trống!',
            'price.required' => 'Trường Không Được Để Trống!',
            'content.required' => 'Chi Tiết Dịch Vụ Được Để Trống!',
        ];
    }
}
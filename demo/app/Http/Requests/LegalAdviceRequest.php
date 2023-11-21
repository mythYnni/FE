<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LegalAdviceRequest extends FormRequest
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
            'name' => 'required|unique:legaladvice',
        ];
    }

     public function messages(){
        return [
            'name.required' => 'Trường Không Được Để Trống!',
            'name.unique' => 'Trường Đã Tồn Tại!',
        ];
    }
}
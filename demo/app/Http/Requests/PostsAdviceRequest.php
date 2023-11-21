<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostsAdviceRequest extends FormRequest
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
            'title' => 'required|unique:postsadvice',
            'content' => 'required'
        ];
    }

     public function messages(){
        return [
            'title.required' => 'Trường Không Được Để Trống!',
            'title.unique' => 'Trường Đã Tồn Tại!',
            'content.required' => 'Nội Dung Không Được Để Trống!',
        ];
    }
}
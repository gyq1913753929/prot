<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBrandPost extends FormRequest
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
            'brand_name' => 'required|unique:brand',
            'brand_url' =>'required',
             'brand_desc'=>'required'
        ];
    }

    public function message()
    {
        return [
            'brand_name.required'=>'品牌名称不能为空',
            'brand_url.required'=>'品牌LOGO不能为空',
            'brand_desc.required'=>'品牌网址不能为空',
        ];
    }
}

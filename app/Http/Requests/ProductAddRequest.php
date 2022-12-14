<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductAddRequest extends FormRequest
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
           'name'=>'bail|required|max:255',
           'price'=>'bail|required|min:1|numeric',
            'sale_price'=>'bail|nullable|numeric|min:0|lt:price',
           'path_image'=>'required',
           'amount'=>'required',
           'category_id'=>'required',
           'brand_id'=>'required',
           'colors'=>'required',
           'content'=>'required',
        ];
    }
}

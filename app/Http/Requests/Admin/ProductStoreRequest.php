<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'brand_id'        => 'required|string|max:255',
            'sub_category_id' => 'required|string|max:255',
            'price'           => 'required|numeric',
            'description'     => 'required|string|max:255',
            'image'           => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}

<?php

namespace App\Http\Requests\admin;

class ProductUpdateRequest extends ProductStoreRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->route('product') === null) {
            abort(404);
        }

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
            'price'           => 'required',
            'description'     => 'required|string|max:255',
            'image'           => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}

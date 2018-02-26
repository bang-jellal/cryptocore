<?php

namespace App\Http\Requests\Admin;

class CategoryUpdateRequest extends CategoryStoreRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->route('category') === null) {
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
            'name'  => 'required|string|max:255',
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}

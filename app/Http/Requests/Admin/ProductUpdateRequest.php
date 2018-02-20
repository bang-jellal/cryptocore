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
}

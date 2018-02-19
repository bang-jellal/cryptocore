<?php

namespace App\Http\Requests\Admin;

class BrandUpdateRequest extends BrandStoreRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->route('brand') === null) {
            abort(404);
        }

        return true;
    }
}

<?php

namespace App\Http\Requests\Admin;

class SubCategoryUpdateRequest extends SubCategoryStoreRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->route('sub_category') === null) {
            abort(404);
        }

        return true;
    }
}

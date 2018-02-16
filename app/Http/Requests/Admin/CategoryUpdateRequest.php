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
}

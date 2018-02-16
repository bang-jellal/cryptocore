<?php

namespace App\Http\Requests;

class UserUpdateRequest extends UserStoreRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->route('user') === null) {
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
            'name'      => 'required|string|max:255',
            'email'     => 'required|email|unique:users,email,'.$this->route('user')->id,
            'role_id'   => 'required',
            'role_id.*' => 'required|exists:roles,id',
            'custom' => [
                'role_id.*' => [
                    'exists' => 'Each person must have a unique e-mail address',
                ]
            ],
        ];
    }
}

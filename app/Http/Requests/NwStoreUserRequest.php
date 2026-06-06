<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NwStoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Change this to implement authorization logic if needed
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:nw_auth_usr,email',
            'password' => 'required|string|min:2|confirmed',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required|min:2|max:100',
            'last_name' => 'required|min:2|max:100',
            'age' => 'required|integer|min:10',
            'phone_number' => 'required|unique:users|min:9|max:20',
            'email' => 'required|unique:users|email',
        ];
    }
}

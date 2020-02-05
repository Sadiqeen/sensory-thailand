<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateUser extends FormRequest
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
            'phone_number' => ['required', 'min:9', 'max:20',
                Rule::unique('users')->ignore($this->user, 'id'),
            ],
            'email' => ['required', 'email',
                Rule::unique('users')->ignore($this->user, 'id'),
            ],
        ];
    }
}

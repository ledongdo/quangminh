<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'name' => 'required|unique:users',
            'email' => 'required|unique:users',
        ];
    }
    public function messages()
    {
    return [
        'name.required' => 'Tên không được bỏ trống',
        'name.unique' => 'Tên đã tồn tại',
        'email.required' => 'email không được bỏ trống',
        'email.unique' => 'email đã tồn tại',
    ];
}
}

<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;

class PasswordUpdateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'password' =>'required|min:8',
            'password_old' =>'required|min:8',
            'password_confirmation' =>'required|min:8'
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 8 characters',
            'password_old.required' => 'Old password is required',
            'password_confirmation.required' => 'Confirmation Password is required',
        ];
    }
}

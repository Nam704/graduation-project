<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'username' => 'required|min:4|max:10',
            'password' => 'sometimes|required|min:4',
            'rePassword' => 'sometimes|required|same:password',
            'email' => 'required|email',
            'avatar' => 'image|mimes:jpeg,png,jpg,svg|max:4000',
            'status' => 'required',
            'address' => 'required|max:250'
        ];
    }
    public function messages(): array
    {
        return [
            'rePassword.same' => 'Re-password does not match the password.',

        ];
    }
}
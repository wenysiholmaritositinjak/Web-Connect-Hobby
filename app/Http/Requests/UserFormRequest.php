<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
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
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'First_Name' => 'nullable|string|max:255',
            'Last_Name' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:255',
            'Location' => 'nullable|string|max:255',
            'email' => 'required|email|unique:users,email,' . auth()->user()->id,
            'profile_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'phone' => 'nullable|string|max:255',
            'gender' => 'nullable|in:male,female',

            // tambahkan validasi lainnya sesuai kebutuhan
        ];
    }
}

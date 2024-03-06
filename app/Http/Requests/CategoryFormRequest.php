<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryFormRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Adjust this according to your authorization logic
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
        ];
    }
}

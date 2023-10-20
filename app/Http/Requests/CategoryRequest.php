<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{

        public function messages()
    {
        return [
            'description.required' => "You need a description for the category.",
        ];
    }

    public function rules()
    {
        return [
            'description' => ['required', 'max:500'],
            'name' => ['required', 'max:20'],
        ];
    }
}

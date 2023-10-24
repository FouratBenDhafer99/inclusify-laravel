<?php

namespace App\Http\Requests;

use \Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{

    public function rules()
    {
        return [
            'description' => ['required', 'max:255'],
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the validation rules as needed
        ];
    }
}

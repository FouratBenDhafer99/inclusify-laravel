<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{

    public function messages()
    {
        return [
            'price.min' => "You cannot put a price that is inferior or equal to 0.",
            'quantity.min' => "You cannot put a quantity that is inferior or equal to 0.",
        ];
    }

    public function rules()
    {
        return [
            'description' => ['required', 'max:255'],
            'name' => ['required', 'max:20'],
            'price' => ['required', 'min:0.01'],
            'quantity' => ['required', 'min:1'],
        ];
    }
}
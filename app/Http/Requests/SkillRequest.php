<?php

namespace App\Http\Requests;

use \Illuminate\Foundation\Http\FormRequest;

class SkillRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required', 'unique:skills', 'max:30']
        ];
    }
}

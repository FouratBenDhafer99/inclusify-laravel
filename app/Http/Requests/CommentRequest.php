<?php

namespace App\Http\Requests;

class CommentRequest extends \Illuminate\Foundation\Http\FormRequest
{

    public function rules()
    {
        return [
            'comment' => ['required', 'max:255'],
        ];
    }
}

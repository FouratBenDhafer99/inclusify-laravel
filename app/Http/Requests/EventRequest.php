<?php

namespace App\Http\Requests;

use \Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'description' => 'required|string',
            'location' => 'required|string',
            'organizer_id' => 'required|exists:users,id',
            'status' => 'required',
            'capacity' => 'required|integer',
            'registration_deadline' => 'required|date',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}

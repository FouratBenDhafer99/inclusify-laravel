<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
{

    public function messages()
    {
        return [
            'answers' => "There should be at least 2 answers and up to 6.",
            'answers.*.*' => "The answers must be at least 2 characters.",
            'isCorrect' => "There should be at least one correct answer.",
        ];
    }

    public function validationData()
    {
        $data = $this->all();
        $data['answers'] = array_filter($data['answers']);
        $data['isCorrect'] = $this->checkIsCorrectKeys($data['isCorrect']??[], $data['answers']);
        return $data;
    }


    public function rules()
    {
        return [
            'description' => ['required', 'max:255'],
            'skill' => ['required', 'exists:skills,id'],
            'answers' => "required|array|min:2|max:6",
            'answers.*' => ['required', 'string', 'min:2', 'max:225'],
            'isCorrect' => "required|array|min:1"
        ];
    }

    private function checkIsCorrectKeys($isCorrect=[], $answers=[])
    {
        foreach ($isCorrect as $key => $value) {
            if (!array_key_exists($key, $answers)) {
                unset($isCorrect[$key]);
            }
        }
        return $isCorrect;
    }
}

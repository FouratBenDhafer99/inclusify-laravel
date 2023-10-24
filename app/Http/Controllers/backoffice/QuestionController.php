<?php

namespace App\Http\Controllers\backoffice;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionRequest;
use App\Models\Question;
use App\Models\Skill;

class QuestionController extends Controller
{

    public function listQuestions(){
        $questions = Question::with('skill')->paginate(5);
        return view('backoffice.pages.questions.question_list', compact('questions', ));
    }
    public function questionForm($id = null)
    {
        $skills = Skill::all();
        $question = Question::with('answers')->find($id);
        return view('backoffice.pages.questions.question_form', compact('question', 'skills'));
    }

    public function addQuestion(QuestionRequest $request)
    {
        $validatedData = $request->validationData();
        $skill = Skill::find($validatedData['skill']);
        $question = $skill->questions()->create([
            'description' => $validatedData['description'],
        ]);
        $i = 0;
        foreach ($validatedData['answers'] as $answerText) {
            if ($answerText)
                $question->answers()->create([
                    'text' => $answerText,
                    'isCorrect' => isset($validatedData['isCorrect'][$i])
                ]);
            $i++;
        }
        return back()->withStatus(__('Question successfully added.'));
    }

    public function deleteQuestion($id)
    {
        Question::where('id',$id)->delete();
        return back()->withStatus(__('Question successfully deleted. '));
    }
}

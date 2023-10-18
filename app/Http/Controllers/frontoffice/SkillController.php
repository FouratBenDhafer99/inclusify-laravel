<?php

namespace App\Http\Controllers\frontoffice;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Skill;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use function Symfony\Component\String\u;

class SkillController extends Controller
{


    public function listSkills()
    {
        $skills = Skill::whereHas('questions', function ($query) {
            $query->select('skill_id', DB::raw('COUNT(*) as question_count'))
                ->groupBy('skill_id')
                ->havingRaw('COUNT(*) >= 3');
        })->get();
        $skillsWithBadge = [];
        foreach ($skills as $skill) {
            $quizzes = $skill->quizzes;
            $i=0;
            while ( $i< sizeof($quizzes) && $quizzes[$i]->created_by == auth()->user()->getAuthIdentifier()){
                if($quizzes[$i]->isSuccessful)
                    array_push($skillsWithBadge, $skill->id);
                $i++;
            }
        }
        return view('frontoffice.pages.skill.list', compact('skills','skillsWithBadge'));
    }

    public function startQuiz($skillId)
    {
        $this->finishUserUnfinishedQuiz($skillId);
        $skill = Skill::find($skillId);
        return view('frontoffice.pages.skill.start_quiz', compact('skill'));
    }

    public function playQuiz($skillId)
    {
        $userDidHave = $this->finishUserUnfinishedQuiz($skillId);
        if ($userDidHave)
            return Redirect::route('skill.start_quiz', $skillId);

        $questions = Question::where('skill_id', $skillId)->with('answers')->get()->random(3);
        $quiz = new Quiz();
        $quiz->skill_id = $skillId;
        $quiz->save();
        $quiz->questions()->attach($questions);
        return view('frontoffice.pages.skill.play_quiz', compact('quiz', 'questions'));
    }

    public function submitQuiz($quizId, Request $request)
    {
        $quiz = Quiz::find($quizId);
        $total = 0;
        $score = 0;
        foreach ($quiz->questions as $question) {
            $answers = $question->answers;
            foreach ($answers as $answer) {
                $total++;
                if (($request[$answer->id] && $answer->isCorrect) || (!$request[$answer->id] && !$answer->isCorrect))
                    $score++;
            }
        }
        $quiz->score = $score / $total * 100;
        if ($quiz->score >= 60)
            $quiz->isSuccessful = true;
        $quiz->isFinished = true;
        $quiz->save();
        return Redirect::route('skill.result_quiz', $quiz->id);
    }

    public function resultQuiz($quizId)
    {
        $quiz = Quiz::find($quizId);
        return view('frontoffice.pages.skill.result_quiz', compact('quiz',));
    }

    private function finishUserUnfinishedQuiz($skillId)
    {
        $quiz = Quiz::where('created_by', auth()->user()->getAuthIdentifier())
            ->where('skill_id', $skillId)
            ->where('isFinished', false)->first();
        if ($quiz) {
            $quiz->isFinished = true;
            $quiz->save();
            return true;
        }
        return false;
    }

}

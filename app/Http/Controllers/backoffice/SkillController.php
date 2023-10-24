<?php

namespace App\Http\Controllers\backoffice;

use App\Http\Controllers\Controller;
use App\Http\Requests\SkillRequest;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Http\Request;

class SkillController extends Controller
{

    public function skillList(){
        $skills = Skill::paginate(5);
        return view('backoffice.pages.skills.skill_list', compact('skills', ));
    }
    public function skillForm($id = null)
    {
        $skill= Skill::find($id);
        return view('backoffice.pages.skills.skill_form',compact('skill'));
    }
    public function addSkill(SkillRequest $request)
    {
        Skill::create([
            'name'=>$request->name
        ]);
        return back()->withStatus(__('Skill successfully added.'));
    }
    public function updateSkill($id, SkillRequest $request)
    {
        Skill::where('id',$id)->update([
            'name'=>$request->name
        ]);
        return back()->withStatus(__('Skill successfully updated. '));
    }

    public function deleteSkill($id)
    {
        Skill::where('id',$id)->delete();
        return back()->withStatus(__('Skill successfully deleted. '));
    }
}

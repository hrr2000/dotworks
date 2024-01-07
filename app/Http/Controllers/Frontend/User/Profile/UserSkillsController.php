<?php

namespace App\Http\Controllers\Frontend\User\Profile;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use Illuminate\Http\Request;
use App\Models\User\UserSkill;

class UserSkillsController extends Controller
{

    //--------------------------------------------
    // Add a skill

    public function store(Request $request){

        $user = auth()->user();

        $request->validate([
            'skill' => 'required|string|max:50',
            'level' => 'required|integer|in:1,2,3'
        ]);

        if(count($user['skills']) >= User::$SKILLS_LIMIT){
            return response()->json([
                'error'=>'you can\'t add more than 20 skills'
            ],422);
        }

        $skill = new UserSkill([
            'name' => $request['skill'],
            'level' => $request['level'],
            'user_id' => $user['id']
        ]);

        try {
            $skill->save();
        } catch(\Exception $exception) {
            return response()->json([
                'error' => 'Skill isn\'t saved!'
            ], 500);
        }

        return response()->json([
            'id' => $skill['id'],
            'name' => $skill['name'],
            'level' => $skill['level']
        ]);

    }

    //--------------------------------------------
    // edit a skill
    public function update($id,Request $request){
        $request->validate([
            'skill'=>'string|max:50',
            'level'=>'integer|in:1,2,3'
        ]);

        $skill = UserSkill::findOrFail($id);
        if($skill->user_id  == auth()->user()->id){
            $skill->name = $request->skill;
            $skill->level = $request->level;
            $skill->save();
            return response()->json([
                'name'=> $skill->name,
                'level'=>$skill->level,
                'id'=>$skill->id
            ]);
        }
    }

    //--------------------------------------------
    // delete a skill
    public function delete($id){

        $skill = UserSkill::findOrFail($id);
        if($skill->user_id == auth()->user()->id){
            $skill->delete();
            return response()->json(['id'=>$id]);
        }
    }
}

<?php

namespace App\Http\Controllers\Frontend\User\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\UserLanguage;

class UserLanguagesController extends Controller
{

    //--------------------------------------------
    // Add new language

    public function store(Request $request){

        $user = auth()->user();

        $request->validate([
            'lang'=>'required|string',
            'level'=>'integer|in:1,2,3',
        ]);

        $errorMessage = $user->isAbleToAddLanguage($request['lang'])['error'];

        if($errorMessage){
            return response()->json([
                'error' => $errorMessage
            ],422);
        }

        $language = new UserLanguage([
            'user_id' => $user['id'],
            'name' => $request['lang'],
            'level' => $request['level']
        ]);

        try {
            $language->save();
        } catch(\Exception $exception) {
            return response()->json([
                'error' => 'Language isn\'t saved!'
            ], 500);
        }

        return response()->json([
            'id' => $language['id'],
            'name' => $language['name'],
            'level' => $language['level']
        ]);

    }

    //--------------------------------------------
    // Edit exist language

    public function update($id, Request $request){

        $user = auth()->user();

        $request->validate([
            'level' => 'integer|in:1,2,3'
        ]);

        $language = $user->languages()->where('id', $id)->get()->first();

        if(!$language) {
            return response()->json([
                'error' => 'Language isn\'t exist!'
            ], 500);
        }

        $language['level'] = $request['level'];

        try {
            $language->save();
        } catch(\Exception $exception) {
            return response()->json([
                'error' => 'Language isn\'t updated!'
            ], 500);
        }

        return response()->json([
            'id' => $id,
            'level' => $language['level']
        ]);

    }

    //--------------------------------------------
    // Delete a language

    public function delete($id){

        $user = auth()->user();

        $language = $user->languages()->where('id', $id)->get()->first();

        if(!$language) {
            return response()->json([
                'error' => 'Language isn\'t exist!'
            ], 500);
        }

        try {
            $language->delete();
        } catch(\Exception $exception) {
            return response()->json([
                'error' => 'Language isn\'t deleted!'
            ], 500);
        }

        return response()->json([
            'id' => $id
        ]);

    }

}

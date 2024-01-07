<?php

namespace App\Http\Controllers\Frontend\User\Profile;

use App\Http\Controllers\Controller;
use App\Models\User\UserImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class UserSlidesController extends Controller
{

// add slides

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'slide' => 'mimes:jpg,jpeg,png,jpp,gif,svg',
        ]);
        if(count(auth()->user()->slides) >= 5){
            return response()->json([
                'errors' => 'Maximum is 5 slides',
            ],422);
        }
        if($validator->fails()){
            return response()->json($validator);
        }else{
            $slideName = 'slide_'.auth()->user()->id.'_'.time().'.'.$request->slide->getClientOriginalExtension();
            $slide = new UserImage();
            $slide->name = $slideName;
            $slide->user_id = auth()->user()->id;
            $slide->save();
            $request->slide->move($slide->path(),$slideName);
            return response()->json([
                'id'=>$slide->id,
                'src'=>url($slide->path().$slideName),
            ]);
        }
    }

    //Update a slide

    public function update($id,Request $request){
        $validator = Validator::make($request->all(),[
            'slide' => 'mimes:jpg,jpeg,png,jpp,gif,svg',
        ]);
        $slide = UserImage::findOrFail($id);
        if($validator->fails()){
            return response()->json($validator);
        }else{
            if(File::exists($slide->path().$slide->name)) {
                File::delete($slide->path().$slide->name);
            }
            $slideName = 'slide_'.auth()->user()->id.'_'.time().'.'.$request->slide->getClientOriginalExtension();
            $slide->name = $slideName;
            $slide->save();
            $request->slide->move($slide->path(), $slideName);
            return response()->json([
                'id'=>$slide->id,
                'src'=>url($slide->path().$slideName)
            ]);
        }
    }

    public function delete($id, Request $request){
        $slide = UserImage::findOrFail($id);
        $slide->delete();
        if(File::exists($slide->path().$slide->name)) {
            File::delete($slide->path().$slide->name);
        }
        return response()->json([
            'id'=>$slide->id,
        ]);
    }

}

<?php

namespace App\Http\Controllers\Admin\Services;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Models\Service\Category;
use App\Models\Service\Service;
use DebugBar\RequestIdGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    public function index(Request $request){
        if($request->ajax()){
            $data = Category::latest()->with(['parent'])->get();
            return DataTables::of($data)
                ->addColumn('action', function($data){
                    $button = '<button type="button" name="edit"
                    data-id="'.$data->id.'"
                    data-name="'.$data->name.'"
                    data-parent-id="'.$data->parent_id .'"
                    class="edit btn btn-primary btn-sm">Edit</button>';
                    $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="delete"
                    data-id="'.$data->id.'"
                    class="delete btn btn-danger btn-sm">Delete</button>';
                    return $button;
                })
                ->addColumn('icon', function($data){
                    return '<img src="'.$data->getIconUrl().'">';
                })
                ->rawColumns(['action','icon'])
                ->make(true);
        }
        $categories = Category::select(['id','name'])->get();
        return view('admin.services.categories',compact(['categories']));
    }

    public function save(Request $request){

        $request->validate([
            'name' => 'string',
        ]);

        $category = $request->method() == 'PUT' ? Category::find($request->selected_id) : new Category;
        $category->name = $request->name;
        $category->parent_id = (int)$request->parent_id;
        if($request->hasFile('icon')) {
            $request->validate([
                'icon' => 'mimes:jpeg,jpg,png,gif'
            ]);
            $icon = strtolower(str_replace(' ','-',$request->name)) . '.' . $request->file('icon')->getClientOriginalExtension();
            $category->icon = $icon;
        }
        $message = 'Data Saved Successfully';
        if($category->save()){
            if($request->hasFile('icon')) $request->file('icon')->storeAs(Category::getIconPath(), $icon);
        } else $message = 'Failed To Save data';
        return response()->json(['message' => $message]);
    }

    public function destroy($id){
        $data = Category::findOrFail($id);
        Storage::delete($data->getIconPath() . '/' . $data->icon);
        Category::where('parent_id',$id)->update(['parent_id'=>'0']);
        $data->delete();
    }
}

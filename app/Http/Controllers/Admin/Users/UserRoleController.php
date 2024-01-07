<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\User\UserRole;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserRoleController extends Controller
{
    public function index(Request $request){
        if($request->ajax()){
            $data = UserRole::latest()->with('users')->get();
            return DataTables::of($data)
                ->addColumn('action', function($data){
                    $button = '<button type="button" name="edit"
                    data-id="'.$data->id.'"
                    data-name="'.$data->name.'"
                    data-description="'.$data->description.'"
                    data-description="'.$data->color.'"
                    data-description="'.$data->icon.'"
                    class="edit btn btn-primary btn-sm">Edit</button>';
                    $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="delete" data-id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                    return $button;
                })
                ->addColumn('number_of_users', function($data){
                    return $data->users->count();
                })
                ->addColumn('role_icon', function($data){
                    return '<img style="width:50px;" src="'.$data->icon.'">';
                })
                ->rawColumns(['action','role_icon'])
                ->make(true);
        }
        return view('admin.users.roles');
    }

    public function save(Request $request){

        $request->validate([
            'name' => 'string',
            'description' => 'string',
        ]);

        $role = $request->method() == 'PUT' ? UserRole::find($request->selected_id) : new UserRole;
        $role->name = $request->name;
        $role->description = $request->description;
        return response()->json([
            'message' => $role->save() ? 'Data Saved Successfully' : 'Failed To Save data',
        ]);
    }

    public function destroy($id){
        $data = UserRole::findOrFail($id);
        $data->delete();
    }
}

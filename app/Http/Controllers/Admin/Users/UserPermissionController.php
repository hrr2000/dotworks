<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\User\UserPermission;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserPermissionController extends Controller
{
    public function index(Request $request){
        if($request->ajax()){
            $data = UserPermission::latest()->with('roles')->get();
            return DataTables::of($data)
                ->addColumn('actions', function($data){
                    $button = '<button type="button" name="edit"
                    data-id="'.$data->id.'"
                    data-name="'.$data->action.'"
                    class="edit btn btn-primary btn-sm">Edit</button>';
                    $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="delete" data-id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                    return $button;
                })
                ->addColumn('number_of_roles', function($data){
                    return $data->roles->count();
                })
                ->rawColumns(['actions'])
                ->make(true);
        }
        return view('admin.users.permissions');
    }

    public function save(Request $request){

        $request->validate([
            'name' => 'string',
        ]);

        $permission = $request->method() == 'PUT' ? UserPermission::find($request->selected_id) : new UserPermission;
        $permission->action = $request->name;
        return response()->json([
            'message' => $permission->save() ? 'Data Saved Successfully' : 'Failed To Save data',
        ]);
    }

    public function destroy($id){
        $data = UserPermission::findOrFail($id);
        $data->delete();
    }
}

<?php

namespace App\Http\Controllers\Admin\Admins;

use App\Http\Controllers\Controller;
use App\Models\Admin\AdminPermission;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AdminPermissionController extends Controller
{
    public function index(Request $request){
        if($request->ajax()){
            $data = AdminPermission::latest()->with('roles')->get();
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
        return view('admin.admins.permissions');
    }

    public function save(Request $request){

        $request->validate([
            'name' => 'string',
        ]);

        $permission = $request->method() == 'PUT' ? AdminPermission::find($request->selected_id) : new AdminPermission;
        $permission->action = $request->name;
        return response()->json([
            'message' => $permission->save() ? 'Data Saved Successfully' : 'Failed To Save data',
        ]);
    }

    public function destroy($id){
        $data = AdminPermission::findOrFail($id);
        $data->delete();
    }
}

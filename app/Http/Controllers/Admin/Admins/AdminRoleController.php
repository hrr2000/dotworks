<?php

namespace App\Http\Controllers\Admin\Admins;

use App\Http\Controllers\Controller;
use App\Models\Admin\AdminRole;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AdminRoleController extends Controller
{
    public function index(Request $request){
        if($request->ajax()){
            $data = AdminRole::latest()->with('admins')->get();
            return DataTables::of($data)
                ->addColumn('action', function($data){
                    $button = '<button type="button" name="edit"
                    data-id="'.$data->id.'"
                    data-name="'.$data->name.'"
                    data-description="'.$data->description.'"
                    class="edit btn btn-primary btn-sm">Edit</button>';
                    $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="delete" data-id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                    return $button;
                })
                ->addColumn('number_of_admins', function($data){
                    return $data->admins->count();
                })
                ->rawColumns(['action','number_of_admins'])
                ->make(true);
        }
        return view('admin.admins.roles');
    }

    public function save(Request $request){

        $request->validate([
            'name' => 'string',
            'description' => 'string',
        ]);

        $role = $request->method() == 'PUT' ? AdminRole::find($request->selected_id) : new AdminRole;
        $role->name = $request->name;
        $role->description = $request->description;
        return response()->json([
            'message' => $role->save() ? 'Data Saved Successfully' : 'Failed To Save data',
        ]);
    }

    public function destroy($id){
        $data = AdminRole::findOrFail($id);
        $data->delete();
    }
}

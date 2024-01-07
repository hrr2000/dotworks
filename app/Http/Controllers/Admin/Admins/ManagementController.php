<?php

namespace App\Http\Controllers\Admin\Admins;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Models\Admin\AdminRole;
use DebugBar\RequestIdGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class ManagementController extends Controller
{
    public function index(Request $request){
        if($request->ajax()){
            $data = Admin::latest()->with('role')->get();
            return DataTables::of($data)
                ->addColumn('action', function($data){
                    $button = '<button type="button" name="edit"
                    data-id="'.$data->id.'"
                    data-name="'.$data->name.'"
                    data-username="'.$data->username.'"
                    data-email="'.$data->email.'"
                    data-status="'.$data->status.'"
                    data-role="'.$data->admin_role_id.'"
                    class="edit btn btn-primary btn-sm">Edit</button>';
                    $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="delete" data- id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                    return $button;
                })
                ->addColumn('account_status', function($data){
                    return $data->status ? 'Active' : 'Banned';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $roles = AdminRole::select(['id','name'])->get();
        return view('admin.admins.management',compact(['roles']));
    }

    public function save(Request $request){

        $request->validate([
            'name' => 'string',
            'username' => 'string',
            'email' => 'string',
            'role' => 'numeric|exists:admin_roles,id',
            'status' => 'numeric|in:0,1',
            'password' => 'string|min:8'
        ]);

        $admin = $request->method() == 'PUT' ? Admin::find($request->selected_id) : new Admin;
        $admin->name = $request->name;
        $admin->username = $request->username;
        $admin->email = $request->email;
        $admin->status = $request->status;
        $admin->admin_role_id = $request->role;
        if ($request->method() == 'POST') $admin->password = Hash::make($request->password);
        return response()->json([
            'message' => $admin->save() ? 'Data Saved Successfully' : 'Failed To Save data',
        ]);
    }

    public function destroy($id){
        $data = Admin::findOrFail($id);
        $data->delete();
    }
}

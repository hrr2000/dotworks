<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Models\User\User;
use App\Models\User\UserRole;
use DebugBar\RequestIdGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class ManagementController extends Controller
{
    public function index(Request $request){
        if($request->ajax()){
            $data = User::latest()->with('role')->get();
            return DataTables::of($data)
                ->addColumn('action', function($data){
                    $button = '<button type="button" name="edit"
                    data-id="'.$data->id.'"
                    data-firstname="'.$data->first_name.'"
                    data-username="'.$data->username.'"
                    data-email="'.$data->email.'"
                    data-status="'.$data->status.'"
                    data-role="'.$data->user_role_id.'"
                    data-verified="'.$data->is_verified.'"
                    class="edit btn btn-primary btn-sm">Edit</button>';
                    $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="delete" data- id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                    return $button;
                })
                ->addColumn('account_status', function($data){
                    return $data->status ? 'Active' : 'Banned';
                })
                ->addColumn('verified', function($data){
                    return $data->is_verified ? 'Yes' : 'No';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $roles = UserRole::select(['id','name'])->get();
        return view('admin.users.management',compact(['roles']));
    }

    public function save(Request $request){

        $request->validate([
            'username' => 'string',
            'role' => 'numeric|exists:user_roles,id',
            'verified' => 'numeric|in:0,1',
            'status' => 'numeric|in:0,1',
        ]);

        $user = User::find($request->selected_id);
        $user->username = $request->username;
        $user->is_verified = $request->verified;
        $user->status = $request->status;
        $user->user_role_id = $request->role;
        return response()->json([
            'message' => $user->save() ? 'Data Saved Successfully' : 'Failed To Save data',
        ]);
    }

    public function destroy($id){
        $data = Admin::findOrFail($id);
        $data->delete();
    }
}

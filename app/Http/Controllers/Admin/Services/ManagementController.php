<?php

namespace App\Http\Controllers\Admin\Services;

use App\Http\Controllers\Controller;
use App\Models\Service\Category;
use App\Models\Service\Service;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ManagementController extends Controller
{
    public function index(Request $request){
        if($request->ajax()){
            $data = Service::latest()->with(['category','provider'])->get();
            return DataTables::of($data)
                ->addColumn('action', function($data){
                    $button = '<button type="button" name="edit"
                    data-id="'.$data->id.'"
                    data-status = "' . $data->status . '"
                    class="edit btn btn-primary btn-sm">Edit</button>';
                    $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="delete" data-id = "' . $data->id . '" class="delete btn btn-danger btn-sm">Delete</button>';
                    return $button;
                })
                ->addColumn('service_status', function($data){
                    return $data->status ? 'Active' : 'Banned';
                })
                ->addColumn('provider', function($data){
                    return '<a target = "_blank" href = "' . $data->provider->getProfileUrl() . '">' . $data->provider->fullName() . '</a>';
                })
                ->addColumn('category', function($data){
                    return $data->category->name;
                })
                ->rawColumns(['action', 'provider'])
                ->make(true);
        }
        $categories = Category::select(['id','name'])->get();
        return view('admin.services.management',compact(['categories']));
    }

    public function save(Request $request){

        $request->validate([
            'status' => 'numeric|in:0,1',
        ]);

        $service = Service::find($request->selected_id);
        $service->status = $request->status;
        return response()->json([
            'message' => $service->save() ? 'Data Saved Successfully' : 'Failed To Save data',
        ]);
    }

    public function destroy($id){
        $data = Service::findOrFail($id);
        $data->delete();
    }
}

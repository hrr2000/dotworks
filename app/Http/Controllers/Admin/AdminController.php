<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    // Admin main page
    public function index()
    {
       $admin = auth()->guard('admin')->user();
       return view('admin.dashboard',compact('admin'));
    }

    // login form showing
    public function showloginform(){
        if(auth()->guard('admin')->check()){
            return redirect()->route('admin.index');
        }else{
            return view('admin.auth.login');
        }
    }

    // login process
    public function login(Request $request){
        // Validate inputted data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        $remember = request()->has('remember') ? true : false;

        if(auth()->guard('admin')->attempt($credentials,$remember)){
            return redirect()->route('admin.index');
        }else{
            return redirect()->back()->withError('Invalid Email or password')->withInput($request->only('email','remember'));
        }
    }

    // logout of admin
    public function logout(Request $request){
        auth()->guard('admin')->logout();
        $request->session()->flush();
        return redirect()->route('home');
    }

}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service\Service;
use App\User;

class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function index(){
        $services = Service::where('state_id', 2)->with(['images','provider'])->get();
        return view('frontend.home',['services' => $services]);
    }
}

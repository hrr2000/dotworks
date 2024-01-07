<?php

namespace App\Http\Controllers\Frontend\User;

use App\Models\User\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class MessageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the contacts list.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $all = auth()->user()->contacts();
        $users = $all['users'];
        $contacts = $all['contacts'];
        return view('frontend.user_panel.messages.index', compact('contacts', 'users'));
    }

    public function contact(Request $request) {

        $request->validate([
            'username' => 'string',
        ]);

        if($request->username == auth()->user()->username)
            abort(404);

        $user = User::where('username', $request->username)->get()->first();

        if(!$user) abort(404);

        return view('frontend.user_panel.messages.contact', compact('user'));

    }
}

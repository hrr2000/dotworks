<?php

namespace App\Http\Controllers\Frontend\User\Profile;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User\User;
use App\Models\Service\Service;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User\Country;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\User\UserProfile\UpdateAccountRequest;
use App\Models\User\UserImage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class UserProfileController extends Controller
{

    public function __construct(){

    }


    /**
     * Show the frontend profile
     *
     * @param int $id (User Id)
     * @param string $slug (User Full Name separated by '-')
     * @return View (The frontend profile view)
     */

    public function show(int $id, string $slug) : View
    {

        $user =  User::find($id);

        // checking whether the name without '-' is right full name
        if(slugify($user->fullName()) !== $slug)
            abort(404);

        return view('frontend.user', [
            'user' => $user,
            'user_languages' => $user->languages,
            'skills' => $user->skills,
            'services' => Service::where(['user_id' => $id, 'state_id' => 2])->with(['images'])->get(),
            'slides' => $user->slides
        ]);

    }

    /**
     * Show edit profile form
     */
    public function edit(){
        $user = auth()->user();
        return view('frontend.user_panel.profile.edit_profile',
            [
                'countries' => DB::table('countries')->get(),
                'languages' => DB::table('languages')->get(),
                'userLanguages' => $user['languages'],
                'levels' => [__('Beginner'),__('Intermediate'),__('Advanced')],
                'skills' => $user['skills'],
                'slides' => $user['slides']
            ]
        );
    }


    /**
     * Save profile updates
     * @param UpdateProfileRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateProfileRequest $request) : RedirectResponse {

        // to make the time word a plural
        if($request['response'] > 1) $request['time'] .= 's';

        // select the frontend that is already logged in to be update
        $user = auth()->user();

        // upload the frontend photo if the photo field is changed
        if($request->has('photo')){
            $extension = $request['photo']->getClientOriginalExtension();  // get file extension
            $request['photo']->storeAs(User::getPhotoPath(), 'frontend-' . $user['id'] . '.' . $extension);
            $user['avatar'] = 'frontend-' . $user['id'] . '.' . $extension;
        }

        // save form data into database
        $user['first_name'] = $request['first_name'];
        $user['last_name'] = $request['last_name'];
        $user['job_title'] = $request['job_title'];
        $user['biography'] = $request['bio'];
        $user['country'] = $request['country'];
        $user['language'] = $request['language'];
        $user['university'] = $request['university'];
        $user['response_time'] = $request['time'] === 'none' ? null : $request['response'] . ' ' . $request['time'];

        $user->save();
        try {
        } catch(\Exception $exception) {
            return redirect()->back()->withErrors(['error' => 'Profile isn\'t updated!']);
        }

        // change website language depending on new chosen language
        session()->put('locale', $user['language']);

        // back with success message
        return redirect()->back()->with(['success'=>'Your profile was updated successfully']);

    }

    public function updateAccount(UpdateAccountRequest $request) {

        $user = User::find(auth()->user()->id);

        if($request['account_old_password']) {
            if(!Hash::check($request['account_old_password'], $user->getAuthPassword()))
                return redirect()->back()->withErrors([
                    'account_old_password' => 'invalid account old password'
                ]);
            $user['password'] = Hash::make($request['account_new_password']);
            try {
                $user->save();
            } catch (\Exception $exception) {
                return redirect()->back()->with(['error' => 'password isn\'t changed!']);
            }
        }

        return redirect()->back()->with(['success' => 'Account was updated successfully.']);

    }

}

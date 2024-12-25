<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\UserProfile;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function index()
    {



        return view('panel.every_state.profile');
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'profile_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'phone' => 'required|string',
            'address' => 'required|string',
            'card_id_info' => 'required|string',
            'position' => 'required|string',
            'dob' => 'required|string',
            'gender' => 'required|string|in:male,female',
        ]);


        if ($request->hasFile('profile_photo')) {
            $input['profile_photo'] = $request->file('profile_photo')->store('images');
        }

        auth()->user()->profile()->create($input);
        session()->flash('create', 'Profile created successfully');
        return redirect(route('view_profile'));

    }
}

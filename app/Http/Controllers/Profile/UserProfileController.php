<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function index()
    {
        $profile = auth()->user()->profile()->orderBy('id', 'desc')->first();

        if ($profile == null) {
            return view('panel.every_state.create_profile');
        }else{
            return view('panel.every_state.update_profile', compact('profile'));
        }

    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'profile_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'phone' => 'required|string',
            'address' => 'required|string',
            'card_id_info' => 'required|string',
            'position' => 'required|string',
            'dob' => 'required|string|after_or_equal:1970-01-01|before_or_equal:2005-01-01',
            'gender' => 'required|string|in:male,female',
        ]);


        if ($request->hasFile('profile_photo')) {
            $input['profile_photo'] = $request->file('profile_photo')->store('images');
        }

        auth()->user()->profile()->create($input);
        session()->flash('create', 'Profile created successfully');
        return redirect(route('view_profile'));
    }

    public function update(Request $request)
    {

        $profile = auth()->user()->profile()->orderBy('id', 'desc')->first();

        $input = $request->validate([
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
            'card_id_info' => 'nullable|string',
            'position' => 'nullable|string',
            'dob' => 'nullable|string|after_or_equal:1970-01-01|before_or_equal:2005-01-01',
            'gender' => 'nullable|string|in:male,female',
        ]);

        if ($request->hasFile('profile_photo')) {
            $input['profile_photo'] = $request->file('profile_photo')->store('images');
        } else {
            $input['profile_photo'] = $profile->profile_photo;
        }

        $profile->update($input);
        session()->flash('update', 'Profile updated successfully');
        return redirect(route('view_profile'));
    }
}

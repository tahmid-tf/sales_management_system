<?php

namespace App\Http\Controllers\Admin\UserManagement;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::whereIn('user_role', ['manager', 'staff'])->get();
        return view('panel.admin.user_management.create', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'user_role' => 'required|in:manager,staff',
        ]);

        User::create($input);
        session()->flash('message', 'User created successfully.');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);

        if (!$user) {
            return "User not found";
        }

        if ($user->user_role == 'admin') {
            return "Unacceptable action";
        }

        if ($user->account_status == 'active') {
            $user->account_status = 'inactive';
            $user->save();
        } elseif ($user->account_status == 'inactive') {
            $user->account_status = 'active';
            $user->save();
        }

        session()->flash('message', 'User access updated successfully.');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

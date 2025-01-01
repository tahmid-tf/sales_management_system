<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PermissionController extends Controller
{

//    ------------------- admin dashboard -------------------

    public function permission()
    {
        if (auth()->user()->user_role == 'admin') {
            return view('panel.admin.dashboard');
        } elseif (auth()->user()->user_role == 'manager') {
            return view('panel.manager.dashboard');
        } elseif (auth()->user()->user_role == 'staff') {
            return view('panel.staff.dashboard');
        } else {
            abort(404);
        }
    }


    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class SuperAdminController extends Controller
{
    public function showRegistrationForm()
{
    return view('auth.superadmin-register');
}


public function register(Request $request)
{
    // Prevent more than one Super Admin
    if (User::where('role', 'super_admin')->exists()) {
        return redirect()->route('login')->with('error', 'Super Admin already exists.');
    }

    // Validate and create Super Admin
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:6|confirmed',
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => 'super_admin',
    ]);

    return redirect()->route('login')->with('success', 'Super Admin registered successfully.');
}

    
}

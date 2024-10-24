<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Retrieve user data from the login table
        $user = DB::table('login')->where('username', $request->username)->first();

        // Check if user exists and verify the password
        if ($user && Hash::check($request->password, $user->password)) {
            // You can use session or any other method to authenticate the user
            // For example, using Laravel's Auth system
            session(['user_id' => $user->id]); // Store user ID in session

            // Redirect to admin page
            return redirect('admin'); // Adjust the path as needed
        }

        // If login fails, redirect back with error message
        return redirect()->back()->with('error', 'Password incorrect!');
    }
}


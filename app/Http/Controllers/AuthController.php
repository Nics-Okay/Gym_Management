<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login'); //AuthController[create]->>VIEW[auth.login]
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            // Handle redirection logic for authenticated users
            if ($user->role === 'admin') {
                // Redirect admin to PIN verification page
                return redirect()->route('admin.pin.show'); // Redirect admin to PIN verification page
            }
    
            return redirect()->route('customer.homepage'); // Redirect customer to their homepage
        }
    
        return response()->json(['message' => 'Invalid credentials.'], 401);
    }

    public function showRightDashboard() {
        {
            // Get the authenticated user
            $user = Auth::user();
    
            // Check the user's role and redirect accordingly
            if ($user->role === 'admin') {
                return redirect()->route('main'); // Ensure this route exists in web.php
            } elseif ($user->role === 'customer') {
                return redirect()->route('customer.homepage'); // Ensure this route exists in web.php
            }
    
            // Default behavior if no matching role
            return redirect()->route('index'); // Change this to a suitable fallback route
        }
    }
}

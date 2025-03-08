<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminPinController extends Controller
{
    public function show()
    {
        // Show the PIN input form
        return view('admin.pin'); //AdminPinController[show]->>VIEW[admin.pin]
    }

    public function verify(Request $request)
    {
        $request->validate([
            'admin_code' => 'required|digits:6', // Must be 6 digits
        ]);

        $user = Auth::user();

        if (Hash::check($request->admin_code, $user->admin_code)) {
            // Redirect to the admin dashboard
            return redirect()->route('main'); //AdminPinController[verify]->>ROUTE[admin.dashboard]
        }

        // Return an error if PIN verification fails
        return back()->withErrors(['admin_code' => 'Invalid PIN']);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class MemberController extends Controller
{
    public function list()
    {
        // Fetch all members along with their related user details
        $members = Member::with('user')->get();
        return view('admin.tracker', compact('members'));
    }
}

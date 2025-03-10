<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Rate;
use App\Models\Scan;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class AdminPagesController extends Controller
{
    public function main(){
        return view('admin.dashboard');
    }

    public function clientsInformation(){
        return view('admin.clients');
    }

    public function guest(){
        return view('admin.guest');
    }

    public function payments(){
        $payments = Transaction::with('member', 'rate')
        ->where('status', 'Pending')
        ->get();

        return view('admin.payments', ['payments' => $payments]);
    }
    
    public function profileSettings(){
        return view('admin.profile');
    }

    public function revenue(){
        return view('admin.revenue');
    }

    public function membershipStatus(){
        return view('admin.status');
    }

    public function membersTracker(){
        $members = Member::all();
        return view('admin.tracker', ['members' => $members,]);
    }

    public function transactionsHistory(){
        return view('admin.transactions');
    }

    public function scanner(){
        $scans = Scan::orderBy('created_at', 'DESC')->get(); // Fetch all scan records
        // $scans = Scan::all(); // Fetch all scan records
        return view('admin.scanner', compact('scans'));
    }

    public function scanStore(Request $request)
    {
        // Validate the incoming QR code ID
        $request->validate([
            'qr_code_id' => 'required|string',
            'time' => 'required', // Ensure time is provided
        ]);

        $user = User::where('qr_code_id', $request->qr_code_id)->first();

        if (!$user) {
            // If no user is found by QR code ID, try to find by name
            $user = User::where('name', $request->qr_code_id)->first();
        }

        // If no user is found by either method, return an error
        if (!$user) {
            return redirect()->back()->with('error', 'Member not found.');
        }

        // Fetch membership details
        $member = $user->member; // Assuming a relationship exists between User and Member

        // If user doesn't have a membership, return an error
        if (!$member) {
            return redirect()->back()->with('error', 'Please avail a membership first.');
        }

        // Check access type
        if ($member->access_type !== 'Allowed') {
            return redirect()->back()->with('error', "Entry has been denied. ({$member->access_type})");
        }

        // Check for active membership status
        if (is_null($member->membership_status) || strtolower($member->membership_status) === 'inactive') {
            return redirect()->back()->with('error', 'No active membership.');
        }

        // Check membership validity
        if (now()->greaterThan($member->membership_validity)) {
            return redirect()->back()->with('error', 'Membership expired.');
        }

        if ($member->is_in_gym) {
            // User is already in the gym, record time out
            $scan = Scan::where('user_id', $user->id)->whereNull('time_out')->latest()->first();
            if ($scan) {
                $scan->update([
                    'time_out' => $request->time,
                ]);
            }

            $member->update([
                'is_in_gym' => false,
            ]);

            return redirect()->back()->with('success', 'Time out recorded successfully.');
        
        } else {

        // Save the scan data
            $scan = Scan::create([
                'user_id' => $user->id,
                'qr_code_id' => $user->qr_code_id,
                'name' => $user->name,
                'membership_status' => $member->membership_status,
                'membership_validity' => $member->membership_validity,
                'access_type' => $member->access_type,
                'time_in' => $request->time, // Automatically fill time_in with the current timestamp
            ]);

            $member->update([
                'is_in_gym' => true,
            ]);

            return redirect()->back()->with('success', 'Time in recorded successfully.');
        }

        return redirect()->back()->with('error', 'Recording unsuccesful.');
    }


    //

    public function createRate(){
        return view('rates.create');
    }
}



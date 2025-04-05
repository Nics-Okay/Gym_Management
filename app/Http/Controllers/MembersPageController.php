<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Rate;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Symfony\Contracts\Service\Attribute\Required;

class MembersPageController extends Controller
{
    public function homepage(){
        $id = Auth::user()->id;
        $member = Member::where('user_id', $id)->first();

        $membershipStatus = $member ? $member->membership_status ?? 'Inactive' : 'Inactive';

        return view('customers.homepage', ['member' => $membershipStatus]);
    }

    public function logs(){
        return view('customers.logs');
    }

    public function membershipRates(){
        $id = Auth::user()->id;

        $rates = Rate::all();

        // Fetch the user's membership details
        $member = Member::where('user_id', $id)->first();

        // Determine membership status
        $membershipStatus = $member?->membership_status ?? 'Inactive';

        $membershipValidity = $member ? $member->membership_validity : null;

        // Check membership validity and format
        $membershipValidity = $membershipValidity ? \Carbon\Carbon::parse($membershipValidity) : null;

        if ($membershipValidity && now()->lessThanOrEqualTo($membershipValidity)) {
            $message = "Your current membership is valid until: {$membershipValidity->format('F j, Y')}";
        } else {
            $message = "Membership information not available.";
        }

        /* $products is the declared variable to hold all the data the the Products MODEL retrieved */
        return view('customers.membershipRates', [
            'rates' => $rates,
            'membershipStatus' => $membershipStatus,
            'membershipValidity' => $membershipValidity,
            'message' => $message,
        ]);
    }

    public function availMembership($rate) {
        $user = Auth::user();
        $rates = Rate::where('id', $rate)->first();

        $member = Member::where('user_id', $user->id)->first();

        $duration = $rates->duration_value;
        $unit = $rates->duration_unit; // Example: days, months
        // $validity = now()->add($duration, $unit);

        // Determine validity
        if ($member) {
            $membershipValidity = $member->membership_validity;
            if ($membershipValidity && \Carbon\Carbon::parse($membershipValidity)->isFuture()) {
                // If membership is still valid, extend it
                $total_validity = \Carbon\Carbon::parse($membershipValidity)->add($duration, $unit);
            } else {
                // If membership is expired or null, use now() as the starting point
                $total_validity = now()->add($duration, $unit);
            }

            // Set additional variables for existing members
            $heading = 'Extend Membership';
            $message = 'Your membership will be extended.';
            $contact_number = $member->contact_number ?? '';
            $address = $member->address ?? ''; // Assuming email is on the related user table

        } else {
            // If no member record exists, calculate validity starting from now
            $total_validity = now()->add($duration, $unit);
    
            // Set variables for new members
            $heading = 'Avail Membership';
            $message = 'You are availing a new membership.';
            $contact_number = '';
            $address = '';
        }

        return view('customers.availMembership', [
            'user' => $user,
            'rates' => $rates,
            'validity' => now()->add($duration, $unit), // New validity for reference
            'total_validity' => $total_validity,       // Final calculated validity
            'heading' => $heading,                     // Dynamic heading for the view
            'message' => $message,                     // Additional info for the view
            'contact_number' => $contact_number,       // Contact number for the input field
            'address' => $address,                         // Email for the input field
        ]);
    }

    public function store(Request $request) {
        // Validate inputs
        $validated = $request->validate([
            'name' => 'required|string|min:3|max:50', ///
            'contact_number' => 'required|string|min:11|max:13', ///
            'address' => 'required|string|min:5|max:255', ///
            'rate_id' => 'required|exists:rates,id', ///
        ]);

        // Retrieve user and selected rate
        // $user = Auth::user(); // Assuming user is logged in
        $user = $request->user();

        if ($user->isDirty('name')) {
            $user->fill(['name' => $validated['name']]);
            $user->save();
        }

        $rate = Rate::findOrFail($request->rate_id);

        // Calculate membership validity
        $duration = $rate->duration_value;
        $unit = $rate->duration_unit; // Example: days, months
        $validity = now()->add($duration, $unit);

        $member = Member::where('user_id', $user->id)->first();

        if ($member) {
            $member->fill([
                'contact_number' => $validated['contact_number'],
                'address' => $validated['address'],
                'membership_status' => 'Active',
                'availed_membership' => 'Extended',
                'membership_validity' => \Carbon\Carbon::parse($member->membership_validity)->add($duration, $unit), // Extend validity
                'access_type' => 'Allowed',
            ]);
        
            $member->save(); // Save the changes to the database
        } else {
            // Create new member
            $member = Member::create([
                'user_id' => $user->id,
                'customer_name' => $validated['name'],
                'contact_number' => $validated['contact_number'],
                'address' => $validated['address'],
                'membership_status' => 'Active',
                'availed_membership' => $rate->name,
                'membership_validity' => $validity,
                'access_type' => 'Allowed',
            ]);
        }

        // Update availed_by count in rates table
        $rate_identity = Rate::find($request->rate_id);

        if ($rate_identity) {
            $rate_identity->availed_by += 1;
            $rate_identity->save();
        }

        return redirect()->route('customer.rates')->with('success', 'Membership successfully confirmed!');
    }

    public function profileSettings(){
        return view('customers.profile');
    }

    public function qr(){
        // Generate a QR code using the QR code ID from the authenticated user
        // auth()->user() =EQUAL= $request->user() but need Request $request instance.
        $qrCodeId = Auth::user()->qr_code_id ?? 'default-value';

        // Generate the QR code
        $qrCode = QrCode::size(200)->generate($qrCodeId);

        // Pass the QR code to the view

        $member = Member::where('user_id', Auth::user()->id)->first();

        $membershipValidity = $member ? Carbon::parse($member->membership_validity)->format('F d, Y') : 'N/A';

        return view('customers.qr', [
            'qrCode' => $qrCode,
            'membershipValidity' => $membershipValidity,
        ]);
    }

    public function settings(){
        return view('customers.settings');
    }
}

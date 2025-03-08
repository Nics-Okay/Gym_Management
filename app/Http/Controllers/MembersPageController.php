<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Rate;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Symfony\Contracts\Service\Attribute\Required;

class MembersPageController extends Controller
{
    public function homepage(){
        $id = Auth::user()->id;
        $member = Member::where('user_id', $id)->first();

        return view('customers.homepage', ['member' => $member]);
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

        $duration = $rates->duration_value;
        $unit = $rates->duration_unit; // Example: days, months
        $validity = now()->add($duration, $unit);
        return view('customers.availMembership', [
            'user' => $user,
            'rates' => $rates,
            'validity' => $validity,
        ]);
    }

    public function store(Request $request) {
        // Validate inputs
        $validated = $request->validate([
            'name' => 'required|string|min:3|max:50',
            'contact_number' => 'required|string|min:11|max:13',
            'address' => 'required|string|min:5|max:255',
            'rate_id' => 'required|exists:rates,id', // Ensure the selected rate exists
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

        $member = Member::create([
            'user_id' => $user->id,
            'contact_number' => $request->contact_number,
            'address' => $request->address,
            'membership_status' => 'active',
            'availed_membership' => $rate->name,
            'membership_validity' => $validity,
            'access_type' => 'Allowed',
        ]);

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
        return view('customers.qr', ['qrCode' => $qrCode]);
    }

    public function settings(){
        return view('customers.settings');
    }
}

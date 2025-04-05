<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Rate;
use App\Models\User;
use Symfony\Contracts\Service\Attribute\Required;

class MemberController extends Controller
{
    public function list()
    {
        $members = Member::with('user')->get();

        return view('admin.tracker', [
            'members' => $members,
        ]);
    }
    

    public function create() {
        $rates = Rate::all();
        return view('admin.member.addMember', ['rates' => $rates]);
    }

    public function store(Request $request) {

        $validated = $request->validate([
            'name' => 'required|string|min:3|max:50|unique:members,customer_name',
            'contact_number' => 'required|string|min:11|max:13',
            'address' => 'required|string|min:5|max:255',
            'duration_option' => 'required|exists:rates,id', // Ensure the selected rate exists
        ]);

        $rate = Rate::findOrFail($request->duration_option);

        $duration = $rate->duration_value;
        $unit = $rate->duration_unit; // Example: days, months
        $validity = now()->add($duration, $unit);

        $member = Member::create([
            'customer_name' => $request->name,
            'contact_number' => $request->contact_number,
            'address' => $request->address,
            'membership_status' => 'active',
            'availed_membership' => $rate->name,
            'membership_validity' => $validity,
            'access_type' => 'Allowed',
        ]);

        $rate_identity = Rate::find($request->duration_option);

        if ($rate_identity) {
            $rate_identity->availed_by += 1;
            $rate_identity->save();
        }

        return redirect()->route('page.list')->with('success', 'Membership successfully confirmed!');
        
    }

    public function edit(Member $member) {

        $rates = Rate::all();

        $members = Member::where('id', $member)->first();

        $member->user_name = $member->user->name ?? $member->customer_name ?? 'Offline';
        $member->user_email = $member->user->email ?? null;
        
        return view('admin.member.editMember', ['member' => $member, 'rates' => $rates]);
    }

    public function update(Member $member, Request $request) {
        
        $validated = $request->validate([
            'name' => 'required|string|min:3|max:50|unique:members,customer_name,' . $member->id,
            'email' => 'nullable|string|max:50',
            'contact_number' => 'required|string|min:11|max:13',
            'address' => 'required|string|min:5|max:255',
            'duration_option' => 'required|exists:rates,id', // Ensure the selected rate exists
        ]);
        
        $rate = Rate::findOrFail($request->duration_option);
        
        $duration = $rate->duration_value;
        $unit = $rate->duration_unit; // Example: days, months
        $validity = now()->add($duration, $unit);

        if ($member->user_id) {
            $member->user->update([
                'name' => $validated['name'] ?? $member->user->name,
                'email' => $validated['email'] ?? 'Offline',
            ]);
        } else {
            // If no associated user, update the member's customer_name
            $member->update([
                'customer_name' => $validated['name'] ?? $member->customer_name,
            ]);
        }

        $member->update([
            'contact_number' => $validated['contact_number'],
            'address' => $validated['address'],
            'availed_membership' => $rate->name,
            'membership_validity' => $validity,
        ]);
        
        return redirect(route('page.list'))->with('success', 'Member Updated Successfully');
    }

    public function delete(Member $member) {
        $member->delete();
        return redirect(route('page.list'))->with('success', 'Member Deleted Successfully');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Rate;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    // Store a new transaction 
    public function store(Request $request)
    {
        /// Input validation
        $validated = $request->validate([
            'name' => 'required|string|min:3|max:50',
            'contact_number' => 'required|string|min:11|max:13',
            'address' => 'required|string|min:5|max:255',
            'rate_id' => 'required|exists:rates,id', // Ensure the selected rate exists
        ]);

        $user = $request->user();

        if ($user->isDirty('name')) {
            $user->fill(['name' => $validated['name']]);
            $user->save();
        }

        $member = Member::where('user_id', $user->id)->first();

        if ($member) {
            if ($member->access_type !== 'Allowed') {
                return redirect()->route('index')->with('error', "Access denied. ({$member->access_type})");
            }

            if ($member->availed_membership !== 'Pending') { // Not pending and not expired
                if (\Carbon\Carbon::parse($member->membership_validity)->isFuture()) {
                    // Update existing member details
                    $member->fill([
                        'customer_name' => $validated['name'],
                        'contact_number' => $validated['contact_number'],
                        'address' => $validated['address'],
                    ]);
                    $member->save();
                } else { // Not pending but expired
                    $member->fill([
                        'customer_name' => $validated['name'],
                        'contact_number' => $validated['contact_number'],
                        'address' => $validated['address'],
                        'membership_status' => 'Expired',
                        'availed_membership' => 'Pending',
                    ]);
                    $member->save();
                }
            }
        } else {
            $member = Member::firstOrCreate([
                'user_id' => $user->id,
                'customer_name' => $validated['name'],
                'contact_number' => $validated['contact_number'],
                'address' => $validated['address'],
                'membership_status' => 'Inactive',
                'availed_membership' => 'Pending',
                'access_type' => 'Allowed',
            ]); 
        }

        Transaction::create([
            'member_id' => $member->id,
            'rate_id' => $validated['rate_id'],
            'status' => 'pending',
            'request_validity' => now()->addDay(), // 24 hours validity
        ]);

        return redirect()->route('customer.rates')->with('success', 'Membership request submitted.');
    }   

    // Approve a transaction
    public function approve(Transaction $transaction)
    {
        if ($transaction->request_validity < now()) {
            return redirect()->back()->with('error', 'Transaction has expired!');
        }

        $rates = Rate::where('id', $transaction->rate_id)->first();

        $duration = $rates->duration_value;
        $unit = $rates->duration_unit;
        $validity = now()->add($duration, $unit);

        $transaction->update([
            'status' => 'approved',
            'validity_start_date' => now(),
            'validity_end_date' => $validity,
        ]);

        $member = Member::where('id', $transaction->member_id)->first();

        if ($member) {
            $membershipValidity = $member->membership_validity;
            if ($membershipValidity && \Carbon\Carbon::parse($membershipValidity)->isFuture()) {
                $total_validity = \Carbon\Carbon::parse($membershipValidity)->add($duration, $unit);
            } else {
                $total_validity = now()->add($duration, $unit);
            }
        }

        $member->update([
            'membership_status' => 'Active',
            'availed_membership' => $member->availed_membership !== 'Pending' ? 'Extended' : $rates->name,
            'membership_validity' => $total_validity,
            'access_type' => 'Allowed',
        ]);

        $rate_identity = Rate::find($transaction->rate_id);

        if ($rate_identity) {
            $rate_identity->availed_by += 1;
            $rate_identity->save();
        }

        return redirect()->route('transactions.index')->with('success', 'Transaction approved.');
    }

    // Cancel a transaction
    public function cancel(Transaction $transaction)
    {
        $transaction->update([
            'status' => 'canceled',
        ]);

        return redirect()->route('transactions.index')->with('success', 'Transaction canceled.');
    }

    public function index()
    {
        $transactions = Transaction::with(['member.user', 'rate'])
            ->where('status', '!=', 'Pending')
            ->get();
    
        // Add user details (if any) to the transactions
        $transactions->each(function ($transaction) {
            if ($transaction->member && $transaction->member->user) {
                // If the user exists in the users table
                $transaction->user_name = $transaction->member->user->name;
                $transaction->user_email = $transaction->member->user->email;
            } else if ($transaction->member) {
                // If the user does not exist, use member's customer_name
                $transaction->user_name = $transaction->member->customer_name;
                $transaction->user_email = 'No Email';
            } else {
                $transaction->user_name = 'No Member';
                $transaction->user_email = 'No Email';
            }
        });
    
        return view('admin.transactions', ['transactions' => $transactions]);
    }

    public function edit(Transaction $transaction)
    {
        $transaction->load(['member.user', 'rate']);
    
        // Add user details to the transaction
        if ($transaction->member && $transaction->member->user) {
            // If the user exists in the users table
            $transaction->user_name = $transaction->member->user->name;
            $transaction->user_email = $transaction->member->user->email;
        } else if ($transaction->member) {
            // If the user does not exist, use member's customer_name
            $transaction->user_name = $transaction->member->customer_name;
            $transaction->user_email = 'No Email';
        } else {
            $transaction->user_name = 'No Member';
            $transaction->user_email = 'No Email';
        }
    
        $rates = Rate::all();
    
        return view('admin.transactions.editTransaction', [
            'transaction' => $transaction,
            'rates' => $rates,
        ]);
    }

    public function update(Transaction $transaction, Request $request) {

        $member = Member::with('user')->where('id', $transaction->member_id)->first();

        $validated = $request->validate([
            'name' => 'required|string|min:3|max:50',
            'email' => 'nullable|string|max:50',
            'contact_number' => 'required|string|min:11|max:13',
        ]);

        if ($member->user_id && $member->user) {
            $member->user->update([
                'name' => $validated['name'] ?? $member->user->name,
                'email' => $validated['email'] ?? 'Offline',
            ]);
        } else {
            $member->update([
                'customer_name' => $validated['name'] ?? $member->customer_name,
            ]);
        }

        $member->update([
            'contact_number' => $validated['contact_number'],
        ]);

        return redirect(route('admin.history'))->with('success', 'Transaction Updated Successfully');
    }

    public function destroy(Transaction $transaction) {
        $transaction->delete();
        return redirect(route('admin.history'))->with('success', 'Member Deleted Successfully');

    }
}

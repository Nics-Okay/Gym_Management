<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Rate;

class RatesController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name'           => 'required|string|max:255',
            'duration_option' => 'required',
            'price'          => 'required|integer'
        ]);

        $option = explode('_', $request->input('duration_option')); // e.g., ['1', 'day'] (convert the string into array)
        $request->merge([
            'duration_value' => (int) $option[0], // (int) cast/convert the value from string>>integer
            'duration_unit'  => $option[1],
        ]);

        // Create the rate record
        $rate = Rate::create($request->only('name', 'duration_value', 'duration_unit', 'price'));

        // Use a fixed timezone if needed (e.g., Asia/Singapore for +8)
        $currentDate = Carbon::now('Asia/Singapore')->startOfDay();

        // Calculate the future date based on the unit
        if ($rate->duration_unit === 'day') {
            $futureDate = $currentDate->copy()->addDays($rate->duration_value);
        } elseif ($rate->duration_unit === 'month') {
            $futureDate = $currentDate->copy()->addMonthNoOverflow($rate->duration_value);
        } elseif ($rate->duration_unit === 'year') {
            $futureDate = $currentDate->copy()->addYears($rate->duration_value);
        }
        
        return redirect()->route('admin.rates')->with('success', 'Rate Created Successfully');

        /*

        return redirect()->route('rates.show', $rate->id)
                        ->with('futureDate', $futureDate->toDateString());
        */
    }

    public function edit(Rate $rate){
        /* $product is a variable params from the route */
        return view('rates.edit', ['rate' => $rate]);

    }

    public function update(Rate $rate, Request $request){
        
        $data = $request->validate([
            'name'           => 'required|string|max:255',
            'duration_option' => 'required',
            'price'          => 'required|integer'
        ]);

        $option = explode('_', $request->input('duration_option'));
            $data['duration_value'] = (int) $option[0]; // update the $data array manually 
            $data['duration_unit']  = $option[1]; // update the $data array manually 

        $rate->update($data);
        return redirect(route('admin.rates'))->with('success', 'Rate Updated Successfully');
    }

    public function destroy(Rate $rate){
        $rate->delete();
        return redirect(route('admin.rates'))->with('success', 'Rate Deleted Successfully');
    }
}

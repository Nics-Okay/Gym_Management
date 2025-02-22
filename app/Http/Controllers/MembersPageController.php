<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use Illuminate\Http\Request;

class MembersPageController extends Controller
{
    public function homepage(){
        return view('customers.homepage');
    }

    public function logs(){
        return view('customers.logs');
    }

    public function membershipRates(){
        $rates = Rate::all();
        /* $products is the declared variable to hold all the data the the Products MODEL retrieved */
        return view('customers.membershipRates', ['rates' => $rates]);
    }

    public function profileSettings(){
        return view('customers.profile');
    }

    public function qr(){
        return view('customers.qr');
    }

    public function settings(){
        return view('customers.settings');
    }
}

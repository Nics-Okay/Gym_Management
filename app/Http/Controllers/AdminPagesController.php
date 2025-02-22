<?php

namespace App\Http\Controllers;

use App\Models\Rate;
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

    public function pendingTransactions(){
        return view('admin.pending');
    }
    
    public function profileSettings(){
        return view('admin.profile');
    }

    public function membershipRates(){
        $rates = Rate::all();
        /* $products is the declared variable to hold all the data the the Products MODEL retrieved */
        return view('admin.rates', ['rates' => $rates]);
    }

    public function revenue(){
        return view('admin.revenue');
    }

    public function membershipStatus(){
        return view('admin.status');
    }

    public function membersTracker(){
        return view('admin.tracker');
    }

    public function transactionsHistory(){
        return view('admin.transactions');
    }

    //

    public function createRate(){
        return view('rates.create');
    }
}



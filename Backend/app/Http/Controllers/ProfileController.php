<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;

class ProfileController extends Controller
{
    public function show()
    {
        // Retrieve the currently authenticated user
        $user = Auth::user();

        // Retrieve the associated customer record based on the user's email
        $customer = Customer::where('Email', $user->email)->first();

        // Pass the user and customer data to the view
        return view('customer', compact('user', 'customer'));
    }

    public function update(Request $request)
    {
        // Retrieve the currently authenticated user
        $user = Auth::user();

        // Retrieve the associated customer record based on the user's email
        $customer = Customer::where('Email', $user->email)->first();

        // Update customer information
        $customer->update($request->all());

        // Redirect back to the profile page
        return redirect()->route('profile.show');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Customer; // Import the Customer model

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show($customerId)
    {
        // Fetch the customer based on the provided CustomerID
        $customer = Customer::where('CustomerID', $customerId)->first();

        return view('customer', compact('customer'));
    }

    public function update(Request $request, $CustomerID) {
        \Log::info('CustomerID: ' . $CustomerID);
    
        $customer = Customer::findOrFail($CustomerID);
    
        // Define the fields that can be null
        $nullableFields = ['Address', 'Phone', 'City', 'State', 'Postcode', 'Country'];
    
        $input = $request->except('_token');
        foreach ($input as $key => $value) {
            if (in_array($key, $nullableFields)) {
                // If the field is nullable and is empty, set it to null
                $customer->$key = $value !== '' ? $value : null;
            } else {
                // For non-nullable fields, just assign the value
                $customer->$key = $value;
            }
        }
    
        $customer->save();
    
        return redirect()->route('account');
    }
    
}
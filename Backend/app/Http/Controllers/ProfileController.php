<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
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

    public function update(Request $request, $id)
{
    $customer = Customer::findOrFail($id);
    // Your update logic
    return redirect()->route('some.route.after.update');
}


}

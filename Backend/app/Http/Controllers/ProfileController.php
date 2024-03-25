<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
   public function show()
{
    $user = Auth::user();
    $user = Auth::user()->load('address', 'phone');

    // Eager load the address and phone relationships
    $user->load('address', 'phone');

    return view('customer', compact('user'));
}



    public function update(Request $request)
    {
        $user = Auth::user();

        // Validate the request data
        $request->validate([
            // Include validation rules for the user, address, and phone data
            'name' => 'required|string',
            // Add more fields as necessary
        ]);

        // Update the user's information
        $user->update($request->only(['name', /* other user fields */]));

        // Update the user's address
        $user->address()->updateOrCreate(
            [],
            $request->only(['phone', 'address', 'city', 'state', 'postcode', 'country'])
        );

        // Update the user's phone
        $user->phone()->updateOrCreate(
            [],
            $request->only(['phone_number'])
        );

        return redirect()->route('profile.show')->with('success', 'Profile updated successfully.');
    }
}

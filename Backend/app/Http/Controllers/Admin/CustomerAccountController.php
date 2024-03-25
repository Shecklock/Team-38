<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class CustomerAccountController extends Controller
{/**
     * Display a listing of the users with filters.
     */
    public function index(Request $request)
{
    $query = User::query();

    // Filter by user ID
    if ($request->filled('user_id')) {
        $query->where('id', $request->user_id);
    }

    // Filter by name
    if ($request->filled('name')) {
        $query->where('name', 'like', "%{$request->name}%");
    }

    // Filter by email
    if ($request->filled('email')) {
        $query->where('email', 'like', "%{$request->email}%");
    }

    // Filter by phone number - ensure your relationships and table names match
    if ($request->filled('phone_number')) {
        $query->whereHas('phone', function ($q) use ($request) {
            $q->where('phone_number', 'like', "%{$request->phone_number}%");
        });
    }

    // Filter by address - ensure your relationships and table names match
    if ($request->filled('address')) {
        $query->whereHas('address', function ($q) use ($request) {
            $q->where('address', 'like', "%{$request->address}%");
        });
    }

    $users = $query->get();

    return view('admin.Users.index', compact('users'));
}


    /**
     * Show the form for editing the specified user.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('admin.Users.edit', compact('user'));
    }

    /**
     * Display the specified user details.
     */
    public function show($id)
    {
        $user = User::with(['address', 'phone'])->findOrFail($id);

        return view('admin.Users.show', compact('user'));
    }

public function update(Request $request, $id)
    {
        // Validate the input data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'postcode' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:255'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Find the user and update their information
        $user = User::findOrFail($id);
        $user->update($request->only(['name', 'email']));

        // Update or create the related address
        $user->address()->updateOrCreate(
            ['user_id' => $user->id], // Assuming you have a 'user_id' column on your addresses table
            $request->only(['address', 'city', 'state', 'postcode', 'country'])
        );

        // Update or create the related phone
        $user->phone()->updateOrCreate(
            ['user_id' => $user->id], // Assuming you have a 'user_id' column on your phones table
            ['phone_number' => $request->input('phone_number')]
        );

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully');
    }


}

<?php
    
    namespace App\Http\Controllers;

	use App\Models\User;
	use App\Models\Address;
	use App\Models\Phone;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    // Constructor to apply middleware
    public function __construct()
    {
        // Assuming 'admin' middleware ensures only admins can access these methods
        $this->middleware('admin');
    }

    // Display a listing of users
    public function index()
    {
        $users = User::with(['address', 'phone'])->get();
        return view('users.index', compact('users'));
    }

    // Show the form for editing the specified user
    public function edit(User $user)
    {
        $user->load('address', 'phone'); // Eager load related models
        return view('users.edit', compact('user'));
    }

    // Update the specified user in the database
    public function update(Request $request, User $user)
    {
        // Validate request data
        $request->validate([
            'name' => 'required|string',
            // Add other validation rules as needed
        ]);

        // Update user and related models
        $user->update($request->except(['email'])); // Assuming you don't want to allow email changes
        $user->address->update($request->only(['address', 'city', 'state', 'postcode', 'country']));
        $user->phone->update($request->only(['phone_number']));

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    // Display the specified user
    public function show(User $user)
    {
        $user->load('address', 'phone'); // Eager load related models
        return view('users.show', compact('user'));
    }
}

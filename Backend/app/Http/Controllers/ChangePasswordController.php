<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ChangePasswordController extends Controller
{
    // Gets the relevant view 
    public function change_password() {
        return view('change_password');
    }

    // Validates all the information is present
    public function update_password(Request $request) {
        $request->validate([
            'old_password'=>'required',
            'new_password'=>'required',
            'confirm_password'=>'required'
        ]);
    
        // Ensures the passwords match
        if ($request->input('new_password') != $request->input('confirm_password')) {
            // Shows a message on screen
            session()->flash('confirm_password', 'Passwords do not match.');
            return redirect()->back();
        } else {

            // Gets the logged in user's details
			$user = auth()->user();
            $hashedPassword = $user->password;
        
        	// Updates the password
            if (Hash::check($request->old_password, $hashedPassword)) {
                $user->password = Hash::make($request->new_password);
                $user->save();
                // Success condition
                session()->flash('success', 'Password updated successfully!');
                return redirect()->route('login');
            } else {
                // Failure condition
                session()->flash('error', 'Old password is incorrect');
                return redirect()->back();
            }
        }
    }

}
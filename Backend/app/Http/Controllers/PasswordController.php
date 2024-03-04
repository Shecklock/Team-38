<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class PasswordController extends Controller
{
    // Gets the relevant view 
    public function forgot_password() {
        return view('forgot_password');
    }

    // Validates all the information is present
    public function update_password(Request $request) {
        $request->validate([
            'email'=>'required|email',
            'new_password'=>'required',
            'confirm_password'=>'required'
        ]);

        // Ensures the passwords match
        if ($request->input('new_password') != $request->input('confirm_password')) {
            // Shows a message on screen
            session()->flash('confirm_password', 'The new password and confirm password must match.');
            return redirect()->back();
        } else {

            // Uses the first matching email
            $user = User::where('email', $request->email)->first();

            // Updates the password
            if ($user) {
                $user->password = Hash::make($request->new_password);
                $user->save();
                // Success condition
                session()->flash('success', 'Password updated successfully!');
                return redirect()->back();
            } else {
                // Failure condition
                session()->flash('error', 'User not found.');
                return redirect()->back();
            }
        }
    }
}

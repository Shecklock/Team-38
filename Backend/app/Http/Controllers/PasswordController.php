<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class PasswordController extends Controller
{
    // Gets the relevant view 
    public function change_password() {
        return view('change_password');
    }

    // Validates all the information is present
    public function update_password(Request $request) {
        $request->validate([
            'email'=>'required|email',
            'new_password'=>'required',
            'confirm_password'=>'required'
        ]);

        // Ensures the passwords match
        if ('new_password' != 'confirm_password') {
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

                session()->flash('success', 'Password updated successfully!');
                return redirect()->route('login');
            } else {
                session()->flash('error', 'User not found.');
                return redirect()->back();
            }
        }
    }
}

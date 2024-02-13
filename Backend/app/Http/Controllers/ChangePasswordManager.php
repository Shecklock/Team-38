<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChangePasswordManager extends Controller
{
    function changePassword(){
        return view("change_password");
    }

    function changePasswordPost(Request $request){
        $request->validate([
            "email" => "required|email|exists:user",
            "newPassword" => "required",
            "confirmPassword" => "required"
        ]);

        User::where("email", $request->email)
            ->update(["password" => Hash::make($request->password)]);
    }
}

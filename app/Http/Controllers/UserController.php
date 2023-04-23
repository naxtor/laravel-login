<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|email:rfc,dns|unique:users',
            'password' => 'required|min:10|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
            'confirm_password' => 'required|min:10|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
        ]);

        if ($request->password != $request->confirm_password) {
            $error = "Password tidak sama";

            return back()->with('error', $error);
        }

        User::create(
            [
                "name" => $request->name,
                "email" => $request->email,
                "password" => Hash::make($request->password),
            ]
        );

        return redirect()->route('login')->with('success', 'Register berhasil !');
    }

    function reset_password(Request $request)
    {
        $request->validate([
            'email' => 'required|email:rfc,dns',
            'password' => 'required|min:10|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
            'confirm_password' => 'required|min:10|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
        ]);


        if ($request->input('password') != $request->input('confirm_password')) {
            $error = "Password tidak sama";

            return back()->with('error', $error);
        }

        $user = User::where('email', $request->input('email'))->first();
        $user->password = $request->input('password');
        $user->save();

        return redirect()->route('login_view')->with('success', 'Reset password berhasil !');
    }
}
